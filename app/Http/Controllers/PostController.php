<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Helper\Helper;
use App\Models\Question;
use App\Models\Categories;
use App\Helper\ImageHelper;
use Illuminate\Http\Request;
use App\Models\QuestionViews;
use App\Models\QuestionCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth']);
    }

    public function getFeed()
    {

        $response_array = array();
        $posts = Post::latest()->where('question_id', null)->take(10)->get();
        //$posts = QuestionCategories::where(); // get all

        $response_array[0] = View::make("feed.index")
            ->with("posts", $posts)
            ->render();

        echo json_encode($response_array);
    }

    public function getPosts()
    {
        $response = '';
        $posts = Post::latest()->where('question_id', null)->take(10)->get();


        foreach ($posts as $post) {
            if ($post->id != 25) {
                if ($post->question_id == null) {
                    $response .= View::make("components.post")
                        ->with("post", $post)
                        ->render();
                } else {
                    if ($post->isApproved()) {
                        $question = Question::where('id', $post->question_id)->get()->first();
                        $total_views = QuestionViews::where('question_id', '=', $question->id)->count();


                        $question_category = QuestionCategories::where('question_id', $question->id)->get();

                        $response .= View::make("components.post")
                            ->with("post", $post)
                            ->with("question", $question)
                            ->with("question_category", $question_category)
                            ->with("total_views", $total_views)
                            ->render();
                    }
                }
            }
        }


        //$videoPost = Post::where('id', 907)->get()->first();


        echo json_encode($response);
    }

    public function index()
    {


        $q_category_array[] = '';
        $question_categories =  DB::table('categories')->select('name')->get();
        foreach ($question_categories as $qc) {
            $q_category_array[] .=  $qc->name;
        }
        //$q_category_array = array_filter($q_category_array);  
        return view('home')->with('question_categories', $q_category_array);
    }

    public function getPost($post_uuid)
    {
        $response_array = array();
        $post = Post::where('uuid', $post_uuid)->where('question_id', null)->get()->first();
        //$posts = Post::where(); // get all

        if ($post->question_id == null) {
            $response_array .= View::make("components.post")
                ->with("post", $post)
                ->render();
        } else {
            if ($post->isApproved()) {
                $question = Question::where('id', $post->question_id)->get()->first();
                $total_views = QuestionViews::where('question_id', '=', $question->id)->count();


                $question_category = QuestionCategories::where('question_id', $question->id)->get();

                $response_array .= View::make("components.post")
                    ->with("post", $post)
                    ->with("question", $question)
                    ->with("question_category", $question_category)
                    ->with("total_views", $total_views)
                    ->render();
            }
        }

        echo json_encode($response_array);
    }

    public function loadNextPost(Request $request)
    {
        $count = (int)$request->count;
        $response_array = array();


        $loopCount = 0;

        for ($i = 0; $i < 9; $i++) {
            $post = Post::skip(10 + $count)->latest()->where('question_id', null)->take(1)->get()->first();
            $count++;
            if ($post != null && $post->id != 25) {

                if ($post->question_id == null) {
                    $response_array[$i] = View::make("components.post")
                        ->with("post", $post)
                        ->render();
                } else {
                    if ($post->isApproved()) {
                        $question = Question::where('id', $post->question_id)->get()->first();
                        $total_views = QuestionViews::where('question_id', '=', $question->id)->count();


                        $question_category = QuestionCategories::where('question_id', $question->id)->get();

                        $response_array[$i] = View::make("components.post")
                            ->with("post", $post)
                            ->with("question", $question)
                            ->with("question_category", $question_category)
                            ->with("total_views", $total_views)
                            ->render();
                    }
                }



                $response_array[$i + 1] = $post->id;
            } else {
                $response_array[$i] = "";
                $response_array[$i + 1] = "";
            }
            $i++;
        }



        echo json_encode($response_array);
    }

    public function show(Post $post)
    {
        /*return view('feed.show', [
            'post' => $post
        ]);*/
        $q_category_array[] = '';
        $question_categories =  DB::table('categories')->select('name')->get();
        foreach ($question_categories as $qc) {
            $q_category_array[] .=  $qc->name;
        }
        //$q_category_array = array_filter($q_category_array);  
        return view('home')->with('question_categories', $q_category_array);
    }

    public function store(Request $request)
    {
        $response_array = array();
        // $this->validator->errors()->toArray();
        $validator = Validator::make($request->all(), [
            'body' => 'required| max: 3000',
        ]);

        if ($validator->fails()) {
            $response_array = $validator->errors()->all();
            array_push($response_array, "");
        } else {

            $path = json_decode(ImageHelper::saveImage($request, 'post_image'));
            $path = $path[0];

            $uuid = Helper::anotherRandomIDGenerator();
            $check_if_uuid_exists = Post::where('uuid', $uuid)->get()->count();
            while ($check_if_uuid_exists > 0) {
                $uuid = Helper::anotherRandomIDGenerator();
                $check_if_uuid_exists = Post::where('uuid', $uuid)->get()->count();
            }

            $request->user()->posts()->create([
                'body' => trim($request->body),
                'image_0' => $path,
                'uuid' => $uuid
            ]);

            $post = Post::where('user_id', auth()->user()->id)->latest()->first();

            if ($post->question_id == null) {
                $response_array[0] = View::make("components.post")
                    ->with("post", $post)
                    ->render();
            } else {
                if ($post->isApproved()) {
                    $question = Question::where('id', $post->question_id)->get()->first();
                    $total_views = QuestionViews::where('question_id', '=', $question->id)->count();


                    $question_category = QuestionCategories::where('question_id', $question->id)->get();

                    $response_array[0] = View::make("components.post")
                        ->with("post", $post)
                        ->with("question", $question)
                        ->with("question_category", $question_category)
                        ->with("total_views", $total_views)
                        ->render();
                }
            }
        }
        return json_encode($response_array);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }

    public function upload_image(Request $request)
    {
        ImageHelper::uploadTempImage($request, "post_image");
    }

    public function deleteImage(Request $request)
    {
        ImageHelper::deleteOldTemp($request->tempPath, 'post_image');
    }

    public function discardPost(Request $request)
    {
        echo json_encode($request->tempPath);
        if ($request->tempPath != null) {
            ImageHelper::deleteOldTemp($request->tempPath, 'post_image');
        }
    }

    public static function getUsersPostsCount($username)
    {
        $user = User::where('username', $username)->get()->first();
        $posts = Post::where('user_id', $user->id)->where('question_id', null)->get();
        $postCount = Helper::numberAbbreviation($posts->count());
        //$postCount = Helper::numberAbbreviation(2000000);
        return $postCount;
    }

    public static function getUsersWhoReactedToPost($post_id)
    {

        $likes = Like::where('post_id', $post_id)->take(10)->get();
        $users = array();
        $response = '';



        foreach ($likes as $like) {
            $user = User::where('id', $like->user_id)->get()->first();
            $connection_view = View::make("components.connection")->with([
                'connection' => $user,
                'isInsideReactionsModal' => 'true'
            ])->render();
            $response .= $connection_view;
        }
        echo json_encode($response);
    }
}

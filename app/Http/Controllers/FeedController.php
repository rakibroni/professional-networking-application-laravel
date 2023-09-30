<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;


class FeedController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth']);
    }



    public function index()
    {
            
        //dd(auth()->user());
        $posts = Post::latest()->with('user', 'likes')->paginate(20);
        //$posts = Post::where(); // get all
        return view('feed.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('feed.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $response_array = array();
        // $this->validator->errors()->toArray();
        $validator = Validator::make($request->all(), [
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            $response_array = $validator->errors()->all();
            array_push($response_array, "");
        } else {
            
            $request->user()->posts()->create([
                'body' => strip_tags($request->body, '<br>')
            ]);

            $post = Post::where('user_id', auth()->user()->id)->latest()->first();
            $response_array[0] = View::make("components.post")
            ->with("post", $post)
            ->render();

        }
        return json_encode($response_array);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }

    public function upload_post_img(Request $request) {
        echo json_encode("adasdas");
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Helper\Helper;
use App\Models\Question;
use App\Models\Categories;
use App\Helper\ImageHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\QuestionViews;
use App\Models\QuestionComment;
use App\Helper\ValidationHelper;
use App\Models\PostStatus;
use App\Models\QuestionCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;


class QuestionController extends Controller
{
    public function index($question_type, $skip, $take)
    {
        $limit = 20;
        $response = array();
        $response[0] = '';
        $response[1] = '';

        //question list answered by expert 
        /*if ($question_type == 'EXPERT') {
            $questions = DB::table('questions')
                ->leftJoin('question_comments', 'question_comments.question_id', '=', 'questions.id')
                ->leftJoin('user_roles', 'user_roles.user_id', '=', 'question_comments.user_id')
                ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
                ->where('roles.name', '=', 'EXPERT')
                ->select('questions.id', 'questions.user_id', 'questions.title', 'questions.description', 'questions.created_at')
                ->groupBy('questions.id', 'questions.user_id', 'questions.title', 'questions.description', 'questions.created_at')
                ->get();
        } else {
            $questions = Question::orderBy('created_at', 'DESC')->limit(10)->get();
        }*/
        $lastQuestion = '';

        switch ($question_type) {
            case 'BYUSER':
                $questions = Question::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->skip($skip)->take($take)->get();
                $lastQuestion = Question::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->skip($skip + $take)->take(1)->get()->first();
                break;
            case 'FOREXPERT':
                $questions = auth()->user()->questionsMatchingExpertise()->skip($skip)->take($take);
                $lastQuestion = auth()->user()->questionsMatchingExpertise()->skip($skip + $take)->take(1);
                break;
            default:
                $questions = Question::orderBy('created_at', 'DESC')->skip($skip)->take($take)->get();
                $lastQuestion = Question::orderBy('created_at', 'DESC')->skip($skip + $take)->take(1)->get()->first();
                break;
        }

        $response[1] = $lastQuestion;


        foreach ($questions as $question) {

            $question_category = QuestionCategories::where('question_id', $question->id)->get();

            $counter = 0;
            if (($limit > $counter) && ($question_type != "FOREXPERT" || auth()->user()->isExpertForQuestion($question_category))) {

                //save question views
                $question_views = new QuestionViews();
                $question_views->question_id = $question->id;
                $question_views->user_id = auth()->user()->id;
                $question_views->save();


                $total_views = QuestionViews::where('question_id', '=', $question->id)->count();
                $total_comments = QuestionComment::where('question_id', '=', $question->id)->count();
                //count total expert answered in a question
                $total_expert_answered = DB::table('question_comments')
                    ->leftJoin('user_roles', 'user_roles.user_id', '=', 'question_comments.user_id')
                    ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
                    ->where('question_comments.question_id', '=', $question->id)
                    ->where('roles.name', '=', 'EXPERT')
                    ->select('question_comments.user_id')
                    ->groupBy('question_comments.user_id')
                    ->get()->count();


                $post = Post::where('question_id', $question->id)->get()->first();


                if ($post && $post->isApproved()) {
                    $response[0] .= View::make("components.post")
                        ->with("post", $post)
                        ->with("question", $question)
                        ->with("question_category", $question_category)
                        ->with("total_views", $total_views)
                        ->render();
                    $counter++;
                }
            }
        }
        echo json_encode($response);
    }

    public function store(Request $request)
    {


        $error = false;
        $responseArray = [];
        $question = new Question;
        $title = $question->title;
        $description = $question->description;

        // VALIDATE Title
        $titleValidator = ValidationHelper::validateString($request, $title, 'title', 'required');
        $responseArray[0] = $titleValidator[0];
        if ($error == false) {
            $error = $titleValidator[1];
        }
        // VALIDATE description
        $descriptionValidator = ValidationHelper::validateString($request, $description, 'description', 'required');
        $responseArray[1] = $descriptionValidator[0];
        if ($error == false) {
            $error = $descriptionValidator[1];
        }
        $responseArray[3] = "";

        if ($error == false) {
            $question->title = $request->title;
            $question->description = $request->description;
            $question->question_for = $request->question_for;
            $question->user_id = auth()->user()->id;
            $question->save();

            Post::create([
                'uuid' => Str::random(10),
                'user_id' => $question->user_id,
                'question_id' => $question->id
            ]);

            //Getting Last inserted id 
            $q_id = $question->id;

            if ($request->questionCategories) {
                foreach ($request->questionCategories as $questionCategory) {
                    $questionSubject = new QuestionCategories;
                    $questionSubject->question_id = $q_id;
                    $questionSubject->category_id = Categories::where('name', $questionCategory)->first()->id;
                    $questionSubject->save();
                }


            } else {
                $questionSubject = new QuestionCategories;
                $questionSubject->question_id = $q_id;
                $questionSubject->category_id = 10;
                $questionSubject->save();
            }
            $responseArray[2] = 'success';

            $total_views = QuestionViews::where('question_id', '=', $question->id)->count();
            $total_comments = QuestionComment::where('question_id', '=', $question->id)->count();




            //count total expert answered in a question
            $total_expert_answered = DB::table('question_comments')
                ->leftJoin('user_roles', 'user_roles.user_id', '=', 'question_comments.user_id')
                ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
                ->where('question_comments.question_id', '=', $question->id)
                ->where('roles.name', '=', 'EXPERT')
                ->select('question_comments.user_id')
                ->groupBy('question_comments.user_id')
                ->get()->count();

            /*$question_category = DB::table('questions')
                ->leftJoin('question_categories', 'question_categories.question_id', '=', 'questions.id')
                ->leftJoin('categories', 'categories.id', '=', 'question_categories.category_id')
                ->where('questions.id', '=', $question->id)
                ->select()
                ->get('categories.name')->toArray();*/
            $question_category = QuestionCategories::where('question_id', $question->id)->get();

            $post = Post::where('question_id', $question->id)->get()->first();

            PostStatus::create([
                'post_id' => $post->id,
                'object_status_id' => 1
            ]);     

            $responseArray[3] = View::make("components.post")
                ->with("post", $post)
                ->with("question", $question)
                ->with("question_category", $question_category)
                ->with("total_views", $total_views)
                ->with("total_comments", $total_comments)
                ->with("total_expert_answered", $total_expert_answered)
                ->render();
            $responseArray[4] =  $question_category;
        }

        echo json_encode($responseArray);
    }
    function getRightSidePanel()
    {
        $response = '';
        $questions = Question::latest()->take(2)->get();

        foreach ($questions as $question) {
            $question_category = QuestionCategories::where('question_id', $question->id)->get();


            $total_views = QuestionViews::where('question_id', '=', $question->id)->count();
            $total_comments = QuestionComment::where('question_id', '=', $question->id)->count();
            //count total expert answered in a question
            $total_expert_answered = DB::table('question_comments')
                ->leftJoin('user_roles', 'user_roles.user_id', '=', 'question_comments.user_id')
                ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
                ->where('question_comments.question_id', '=', $question->id)
                ->where('roles.name', '=', 'EXPERT')
                ->select('question_comments.user_id')
                ->groupBy('question_comments.user_id')
                ->get()->count();


            $response .= View::make("question.right_side_panel_question")
                ->with("question", $question)
                ->with("question_category", $question_category)
                ->with("total_views", $total_views)
                ->with("total_comments", $total_comments)
                ->with("total_expert_answered", $total_expert_answered)
                ->render();
        }
        echo json_encode($response);
    }
}

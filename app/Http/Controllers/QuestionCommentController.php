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
use App\Models\QuestionComment;
use App\Helper\ValidationHelper;
use App\Models\QuestionCategories;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionCommentLike;
use App\Models\QuestionCommentReply;
use App\Models\UserRole;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class QuestionCommentController extends Controller
{
    public function index(Request $request)
    {
      
        $response = ''; 
        // $question_comments = DB::table('question_comments') 
        //         ->where('question_comments.question_id', '=', $request->question_id)
        //         ->select()
        //         ->get()->toArray(); 
        $question_comments = QuestionComment::where('question_id', $request->question_id)->orderBy('created_at', 'DESC')->paginate(3);

        foreach ($question_comments as $question_comment) {
            $total_comment_replies = QuestionCommentReply::where('question_comment_id', '=', $question_comment->id)->count();
            $total_comment_likes = QuestionCommentLike::where('comment_id', $question_comment->id)->count();
            $user_like_check = QuestionCommentLike::where('comment_id', $question_comment->id)->where('user_id', auth()->user()->id)->count();
            $isExpertUser = UserRole::where('user_id', '=',  $question_comment->user_id)->where('role_id', '=', 2)->first();
            $questionCategories = QuestionCategories::where('question_id', $request->question_id)->get();

            $response .= View::make("components.question_comment")
                ->with("question_comment", $question_comment)
                ->with("total_comment_replies", $total_comment_replies)
                ->with("total_comment_likes", $total_comment_likes)
                ->with("user_like_check", $user_like_check)
                ->with("isExpertUser", $isExpertUser)
                ->with("questionCategories", $questionCategories)
                ->render();
                
        }
        echo json_encode($response);
    }
    public function store(Request $request)
    {
        $response = '';
        if ($request->text != "") {
            $question_comment = new QuestionComment();
            $question_comment->comment = $request->text;
            $question_comment->question_id = $request->question_id;
            $question_comment->user_id = auth()->user()->id;
            $question_comment->save();

            //$question_comments = QuestionComment::where('question_id', $request->question_id)->latest()->first();
            $question_comments = QuestionComment::where('question_id', $request->question_id)->orderBy('created_at', 'DESC')->paginate(3);

            //dd($question_comments);

            // // CREATE NOTIFICATION
            // NotificationsController::createNotification('comment', $post->user_id, $post->id, $comment->id);
            $questionCategories = QuestionCategories::where('question_id', $request->question_id)->get();
            foreach ($question_comments as $question_comment) {
                $total_comment_replies = QuestionCommentReply::where('question_comment_id', '=', $question_comment->id)->count();
                $total_comment_likes = QuestionCommentLike::where('comment_id', $question_comment->id)->count();
                $user_like_check = QuestionCommentLike::where('comment_id', $question_comment->id)->where('user_id', auth()->user()->id)->count();
                $isExpertUser = UserRole::where('user_id', '=',  $question_comment->user_id)->where('role_id', '=', 2)->first();
                $questionCategories = QuestionCategories::where('question_id', $request->question_id)->get();
                // EXPERTEN STATUS ANZEIGEN
                $response .= View::make("components.question_comment")
                    ->with("question_comment", $question_comment)
                    ->with("total_comment_replies", $total_comment_replies)
                    ->with("total_comment_likes", $total_comment_likes)
                    ->with("user_like_check", $user_like_check)
                    ->with("isExpertUser", $isExpertUser)
                    ->with("questionCategories", $questionCategories)
                    ->render();
            }
            echo json_encode($response);
        }
    }
    function loadMoreQuestionComment(Request $request)
    {
        $response = '';
        $skip = $request->skip;
        $take = 3;
        $question_comments = QuestionComment::skip($skip)->take($take)->where('question_id', $request->question_id)->orderBy('created_at', 'DESC')->get();

        foreach ($question_comments as $question_comment) {
            $total_comment_replies = QuestionCommentReply::where('question_comment_id', '=', $question_comment->id)->count();
            $total_comment_likes = QuestionCommentLike::where('comment_id', $question_comment->id)->count();
            $user_like_check = QuestionCommentLike::where('comment_id', $question_comment->id)->where('user_id', auth()->user()->id)->count();
            $isExpertUser = UserRole::where('user_id', '=',  $question_comment->user_id)->where('role_id', '=', 2)->first();
            $questionCategories = QuestionCategories::where('question_id', $request->question_id)->get();

            $response .= View::make("components.question_comment")
                ->with("question_comment", $question_comment)
                ->with("total_comment_replies", $total_comment_replies)
                ->with("total_comment_likes", $total_comment_likes)
                ->with("user_like_check", $user_like_check)
                ->with("isExpertUser", $isExpertUser)
                ->with("questionCategories", $questionCategories)
                ->render();
        }
        echo json_encode($response);
    }
}

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
use App\Models\QuestionCommentReply;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class QuestionCommentReplyController extends Controller
{
    public function index(Request $request)
    {
        $response = '';
        $question_comment_replies = QuestionCommentReply::where('question_comment_id', $request->question_comment_id)->orderBy('created_at', 'DESC')->paginate(3);
        $questionId = QuestionComment::where('id', $request->question_comment_id)->get()->first()->question_id;
        $questionCategories = QuestionCategories::where('question_id', $questionId)->get();


        foreach ($question_comment_replies as $question_comment_reply) {
            $response .= View::make("question.question_comment_reply")
            ->with([
                'question_comment_reply' => $question_comment_reply,
                'questionCategories' => $questionCategories
            ])->render();
        }
        echo json_encode($response);
    }
    public function store(Request $request)
    {
        $response = '';
        if ($request->text != "") {
            $question_comment_reply = new QuestionCommentReply();
            $question_comment_reply->reply_comment = $request->text;
            $question_comment_reply->question_comment_id = $request->question_comment_id;
            $question_comment_reply->user_id = auth()->user()->id;
            $question_comment_reply->save();

            //$question_comments = QuestionComment::where('question_id', $request->question_id)->latest()->first();
            $question_comment_replies = QuestionCommentReply::where('question_comment_id', $request->question_comment_id)->orderBy('created_at', 'DESC')->paginate(3); 
            $questionId = QuestionComment::where('id', $request->question_comment_id)->get()->first()->question_id;
            $questionCategories = QuestionCategories::where('question_id', $questionId)->get();
            foreach ($question_comment_replies as $question_comment_reply) {
                $response .= View::make("question.question_comment_reply")
                ->with([
                    'question_comment_reply' => $question_comment_reply,
                    'questionCategories' => $questionCategories
                ])->render();
            }
            echo json_encode($response);
        }
    }
    function loadMoreQuestionCommentReply(Request $request){
        $response = ''; 
        $skip=$request->skip;
        $take=3;
        $question_comment_replies=QuestionCommentReply::skip($skip)->take($take)->where('question_comment_id', $request->question_comment_id)->orderBy('created_at', 'DESC')->get();
        $questionId = QuestionComment::where('id', $request->question_comment_id)->get()->first()->question_id;
        $questionCategories = QuestionCategories::where('question_id', $questionId)->get();
        foreach ($question_comment_replies as $question_comment_reply) {  
            $response .= View::make("question.question_comment_reply")
            ->with([
                'question_comment_reply' => $question_comment_reply,
                'questionCategories' => $questionCategories
            ])->render();
        }
        echo json_encode($response);
        
    }
}

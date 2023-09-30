<?php

namespace App\Http\Controllers;

use App\Models\QuestionCommentLike;
use Illuminate\Http\Request;

class QuestionCommentLikeController extends Controller
{
    function store(Request $request)
    {
        
        $like_comment = QuestionCommentLike::where('comment_id', $request->comment_id)->where('user_id', auth()->user()->id)->get()->first();
       // dd( $like_comment);
         
        if (!empty($like_comment)) { 
            QuestionCommentLike::where('comment_id', $request->comment_id)->where('user_id', auth()->user()->id)->delete();
            $response_array[0] = [QuestionCommentLike::where('comment_id', $request->comment_id)->count()]; 
            //NotificationsController::createNotification('like', $post->user_id, $post->id, '');
        } else { 
            $question_comment_like = new QuestionCommentLike();
            $question_comment_like->comment_id = $request->comment_id;
            $question_comment_like->user_id = auth()->user()->id;
            $question_comment_like->save();
            $response_array[0] = [QuestionCommentLike::where('comment_id', $request->comment_id)->count()];  
        }
        echo json_encode($response_array);
    }
}

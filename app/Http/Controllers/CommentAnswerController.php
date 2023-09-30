<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CommentAnswer;
use App\Helper\ValidationHelper;
use App\Models\CommentAnswerAnswer;
use App\Models\QuestionCommentReply;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\NotificationsController;

class CommentAnswerController extends Controller
{
    public function create(Request $request)
    {
        $responseArray = [
            "commentAnswer" => "",
            "commentAnswerCount" => "",
            "idArray" => array()
        ];
        $commentId = $request->id;
        $commentText = trim($request->text);

        $type = $request->type;
        $idPrefix = "";
        $idArray = array();
        switch ($type) {
            case 'comment':
                $comment = Comment::where('uuid', $commentId)->get()->first();

                if ($comment->post()->question_id != null) {

                    $questionComment = QuestionCommentReply::create([
                        'reply_comment' => $commentText,
                        'question_comment_id' => $comment->question_comment_id,
                        'user_id' => auth()->user()->id
                    ]);


                    $commentAnswer = $comment->answers()->create([
                        'user_id' => auth()->user()->id,
                        'text' => $commentText,
                        'post_id' => $comment->post_id,
                        'uuid' => Str::random(10),
                        'question_comment_reply_id' => $questionComment->id
                    ]);

                } else {
                    $commentAnswer = $comment->answers()->create([
                        'user_id' => auth()->user()->id,
                        'text' => $commentText,
                        'post_id' => $comment->post_id,
                        'uuid' => Str::random(10),
                    ]);
                }






                $responseArray['commentAnswer'] = View::make("components.comment_answer")->with([
                    'commentAnswer' => $commentAnswer,
                    'showCommentLines' => false

                ])->render();
                $responseArray['commentAnswerCount'] = $comment->totalAnswersCount();

                array_push($idArray, $comment->uuid);
                



                break;
            case 'answer':
                $comment = CommentAnswer::where('uuid', $commentId)->get()->first();

                /*if ($comment->post()->question_id != null) {

                    $parentComment = $comment->parentComment();                    
                    $questionComment = QuestionCommentReply::create([
                        'reply_comment' => $commentText,
                        'question_comment_id' => $parentComment->question_comment_id,
                        'user_id' => auth()->user()->id
                    ]);

                    $commentAnswer = CommentAnswerAnswer::create([
                        'user_id' => auth()->user()->id,
                        'text' => $commentText,
                        'post_id' => $comment->post_id,
                        'uuid' => Str::random(10),
                        'comment_answer_id' => $commentId,
                        'parent_comment_id' => $comment->comment_id,
                        'question_comment_reply_id' => $questionComment->id
                    ]);
                } else {
                    $commentAnswer = CommentAnswerAnswer::create([
                        'user_id' => auth()->user()->id,
                        'text' => $commentText,
                        'post_id' => $comment->post_id,
                        'uuid' => Str::random(10),
                        'comment_answer_id' => $commentId,
                        'parent_comment_id' => $comment->comment_id
                    ]);
                }*/

                $commentAnswer = CommentAnswerAnswer::create([
                    'user_id' => auth()->user()->id,
                    'text' => $commentText,
                    'post_id' => $comment->post_id,
                    'uuid' => Str::random(10),
                    'comment_answer_id' => $commentId,
                    'parent_comment_id' => $comment->comment_id
                ]);

 


                $responseArray['commentAnswer'] = View::make("components.comment_answer")->with([
                    'commentAnswer' => $commentAnswer,
                    'type' => 'answerToAnswer',
                    'additionalMargin' => 40,
                    'pictureSize' => 20,
                    'marginToPicture' => 25,
                    'showCommentLines' => false,

                ])->render();
                //$responseArray['commentAnswerCount'] = $comment->answers()->count();
                // NUR +1 ewr
                $responseArray['commentAnswerCount'] = CommentAnswerAnswer::where('comment_answer_id', $commentId)->get()->count();


                array_push($idArray, $comment->uuid);
                array_push($idArray, Comment::where('id', $comment->comment_id)->get()->first()->uuid);
                $responseArray['idArray'] = $idArray;
                
                break;
            case 'answerToAnswer':

                $comment = CommentAnswerAnswer::where('uuid', $commentId)->get()->first();


                    
                



                $commentAnswer = CommentAnswerAnswer::create([
                    'comment_answer_id' => $commentId,
                    'user_id' => auth()->user()->id,
                    'text' => $request->text,
                    'post_id' => $comment->post_id,
                    'uuid' => Str::random(10),
                    'parent_comment_id' => $comment->parent_comment_id
                ]);




                $answerLevel = $comment->answerLevel();
                if ($answerLevel < 3) {
                    $additionalMargin = 45 + $answerLevel * 25;
                } else {
                    $additionalMargin = 45 + 2 * 25;
                    $additionalMarginSkeleton = 95;
                }

                $additionalMarginSkeleton = $additionalMargin +  25;
                if ($additionalMarginSkeleton > 95) {
                    $additionalMarginSkeleton = 95;
                }

                $responseArray['commentAnswer'] = View::make("components.comment_answer")->with([
                    'commentAnswer' => $commentAnswer,
                    'type' => 'answerToAnswer',
                    'additionalMargin' => $additionalMargin,
                    'pictureSize' => 20,
                    'marginToPicture' => 25,
                    'additionalMarginSkeleton' => $additionalMarginSkeleton,
                    'showCommentLines' => false

                ])->render();
                $responseArray['commentAnswerCount'] = $comment->answers()->count();
                $parentComment = CommentAnswerAnswer::where('uuid', $commentAnswer->comment_answer_id)->get()->first();
                while ($parentComment) {
                    array_push($idArray, $parentComment->uuid);
                    $last = $parentComment;
                    $parentComment = CommentAnswerAnswer::where('uuid', $parentComment->comment_answer_id)->get()->first();
                }
                $parentParentComment = CommentAnswer::where('uuid', $last->comment_answer_id)->get()->first();
                array_push($idArray, $parentParentComment->uuid);
                array_push($idArray, Comment::where('id', $parentParentComment->comment_id)->get()->first()->uuid);

                $responseArray['idArray'] = $idArray;
                break;
        }

        
        

        //NotificationsController::createNotification('comment', 1, 1, 1);
        echo json_encode($responseArray);
    }
}
 
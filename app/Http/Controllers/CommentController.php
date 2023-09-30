<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\QuestionComment;
use Illuminate\Support\Facades\View;

class CommentController extends Controller
{
    public static function addComment(Request $request)
    {
        if ($request->text != "") {
            $post = Post::where('id', $request->postID)->first();
            //$body = strip_tags($request->text, "<br>");

            if ($post->question_id != null) {
                $questionComment = QuestionComment::create([
                    'comment' => $request->text,
                    'question_id' => $post->question_id,
                    'user_id' => auth()->user()->id
                ]);

                $post->comments()->create([
                    'user_id' => $request->user()->id,
                    'uuid' => Str::random(10),
                    'question_comment_id' => $questionComment->id,
                ]);
            } else {
                $post->comments()->create([
                    'user_id' => $request->user()->id,
                    'text' => $request->text,
                    'uuid' => Str::random(10)
                ]);
            }




            $comment = Comment::where('post_id', $request->postID)->latest()->first();

            // CREATE NOTIFICATION
            NotificationsController::createNotification('comment', $post->user_id, $post->id, $comment->id);

            return json_encode(View::make("components.comment")
                ->with("comment", $comment)->with("questionComment, $questionComment")
                ->render());
        }
    }
}

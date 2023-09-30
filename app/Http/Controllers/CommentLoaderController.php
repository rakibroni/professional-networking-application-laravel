<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\CommentAnswer;

use App\Models\QuestionCategories;
use App\Models\CommentAnswerAnswer;
use Illuminate\Support\Facades\View;

class CommentLoaderController extends Controller
{
    public function index($objectId, $counter, $type)
    {
        $responseArray = [
            'objects' => array(),
            'counter' => ''
        ];

        // FIND POST ID FROM UUID
        // CHECK ARRAY BEFORE
        $additionalMarginSkeleton = 45;
        $idPrefix = '';
        $additionalMargin = 45;
        switch ($type) {
            case 'comment':
                $post = Post::where('uuid', $objectId)->get()->first();
                break;
            case 'answer':
                $post = Comment::where('uuid', $objectId)->get()->first();
                break;
            case 'answerToAnswer':
                $post = CommentAnswer::where('uuid', $objectId)->get()->first();
                $additionalMarginSkeleton = $additionalMargin +  25;
                if (!$post) {


                    $post = CommentAnswerAnswer::where('uuid', $objectId)->get()->first();
                    $answerLevel = $post->answerLevel();
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
                }
                break;
        }

        if ($post) {
            $objectId = $post->uuid;

            // SET HOW MANY COMMENTS SHALL BE LOADED
            $getAmount = 3;
            for ($i = 0; $i < $getAmount; $i++) {
                // PREFIX beobachten
                switch ($type) {
                    case 'comment':
                    
                        $comment = Comment::where('post_id', $post->id)->orderBy('created_at', 'DESC')->skip($counter)->take(1)->get()->first();
                        break;
                    case 'answer':
                        $comment = CommentAnswer::where('comment_id', $post->id)->orderBy('created_at', 'DESC')->skip($counter)->take(1)->get()->first();
                        break;
                    case 'answerToAnswer':
                        $comment = CommentAnswerAnswer::where('comment_answer_id', $objectId)->orderBy('created_at', 'DESC')->skip($counter)->take(1)->get()->first();
                        break;
                }


                if ($comment) {
                    $counter++;

                    switch ($type) {
                        case 'comment':
         
                            

                            $view = View::make("components.comment")->with([
                                'comment' => $comment,

                            ])->render();
                            break;
                        case 'answer':
                            $view = View::make("components.comment_answer")->with([
                                'commentAnswer' => $comment,
                            ])->render();
                            break;
                        case 'answerToAnswer':
                            $view = View::make("components.comment_answer")->with([
                                
                                'commentAnswer' => $comment,
                                'type' => 'answerToAnswer',
                                'additionalMargin' => $additionalMargin,
                                'pictureSize' => 20,
                                'marginToPicture' => 25,
                                'additionalMarginSkeleton' => $additionalMarginSkeleton

                            ])->render();
                            break;
                            // MIT MODE 
                    }

                    array_push($responseArray['objects'], $view);
                } else {
                    //array_push($responseArray['objects'], "");
                }

                // TEST HIER 
            }

            switch ($type) {
                case 'comment':
                    $nextComment = Comment::where('post_id', $post->id)->skip($counter + 1)->take(1)->get()->first();
                    break;
                case 'answer':
                    $nextComment = CommentAnswer::where('comment_id', $post->id)->skip($counter + 1)->take(1)->get()->first();
                    break;
                case 'answerToAnswer':
                    $nextComment = CommentAnswerAnswer::where('comment_answer_id', $objectId)->skip($counter + 1)->take(1)->get()->first();
                    break;
            }

            if (!$nextComment) {
                array_push($responseArray['objects'], "");
            }
        } else {
            array_push($responseArray['objects'], "EMPTYY");
        }
        $responseArray['counter'] = $counter;

        echo json_encode($responseArray);
    }
}

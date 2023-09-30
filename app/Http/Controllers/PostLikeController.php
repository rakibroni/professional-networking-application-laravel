<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); // only let auth users make likes
    }


    public function likePost(Request $request) {
        $response_array = array();
        $post = Post::where('id', $request->post_id)->get()->first();

        if (!$post->likedBy($request->user())) {
            $post->likes()->create([
                'user_id' => $request->user()->id,
            ]);
            $response_array[0] = [$post->likes->count() + 1];
            NotificationsController::createNotification('like', $post->user_id, $post->id, '');
        } else {
            $response_array[0] = [$post->likes->count()];
        }
        echo json_encode($response_array);
    }

    public function removePostLike (Request $request) {
        $post = Post::where('id', $request->post_id)->get()->first();
        $request->user()->likes()->where('post_id', $request->post_id)->delete();
        $response_array[0] = [$post->likes->count()];
        echo json_encode($response_array);
    }
}

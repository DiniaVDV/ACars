<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

/**
 * Class CommentsController
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{
    /**
     * Save comment.
     * @return Comment
     */
    public function addComment(Request $request)
    {
        $comment = new Comment;
        $itemId = $request->input('itemId');

        $comment->item_id = $itemId;
        $comment->message = $request->input('comment');
        $comment->user_id = $request->input('userId');
        $comment->status = 'published';

        $comment->save();
        return $comment;
    }


    /**
     * save like.
     *
     * @param Request $request
     */
    public function countLikes(Request $request)
    {
        $id = $request->input('comment_id');
        $comment = Comment::find($id );
        $comment->like += 1;
        $comment->save();
    }
}

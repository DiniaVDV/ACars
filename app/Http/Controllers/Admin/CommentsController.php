<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use App\Models\Item;

class CommentsController extends Controller
{

    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.comments.show', compact('comments'));
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $user = $comment->user()->get();
        $item =  $comment->item()->get();
        return view('admin.comments.edit', compact('comment', 'user', 'item'));
    }

    public function update($id, CommentsRequest $request)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return redirect('admin/comments')->with([
            'flash_message' => 'Комментарий обновлен!',
            'flash_message_important' => true
        ]);
    }

    public function delete($id)
    {
        Comment::findOrFail($id)->delete();
        return redirect('admin/comments')->with([
            'flash_message' => 'Комментарий удален!',
            'flash_message_important' => true
        ]);
    }

}

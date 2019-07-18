<?php

namespace App\Http\Controllers\Admin\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;

class CommentController extends Controller
{
    public function index($articleID)
    {
        return view('admin/comment/index')->withArticle(Article::with('hasManyComments')->find($articleID));;
    }

    public function destroy($articleID, $commentID)
    {
        Comment::find($commentID)->delete();
        return redirect()->back()->withInput()->withErrors('Delete Success');
    }

    public function edit($articleID, $commentID)
    {
        return view('admin/comment/edit')->withComment(Comment::find($commentID));
    }

    public function update(Request $request, $articleID, $commentID)
    {
        $this->validate($request, [
            'nickname' => 'required|max:255',
            'email' => 'required',
            'website' => 'required',
            'content' => 'required'
        ]);

        $comment = Comment::find($commentID);
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->website = $request->get('website');
        $comment->content = $request->get('content');
        if ($comment->save()) {
            return redirect("admin/articles/{$comment->article_id}/comments/");
        } else {
            return redirect()->back()->withInput()->withErrors('Fail');
        }
    }
}

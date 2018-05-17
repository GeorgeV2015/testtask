<?php

namespace App\Http\Controllers\Admin;

use App\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller {

    public function index()
    {
        $comments = Comments::all();

        return view('admin.comments.index', compact('comments'));
    }

    public function edit($id)
    {
        $comment = Comments::find($id);

        return view('admin.comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text'  => 'required'
        ]);
        $comment = Comments::find($id);
        $name = $comment->name;
        $comment->edit($request->get('text'));

        return redirect()->route('comments.index')->with('status', "Comment by $name has been updated");
    }

    public function destroy($id)
    {
        $comment = Comments::find($id);
        $name = $comment->name;
        $comment->delete();

        return redirect()->back()->with('status', "Comment by $name has been deleted");
    }
}

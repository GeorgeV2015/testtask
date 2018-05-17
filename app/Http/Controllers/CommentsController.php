<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller {

    public function index()
    {
        $comments = Comments::paginate(4);
        $title = 'Guest Book';

        return view('pages.comments.index', compact('comments', 'title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|min:2|alpha_num',
            'email' => 'required|email',
            'text'  => 'required'
        ]);

        $comment = new Comments();
        $comment->fill($request->all());
        $comment->save();

        return redirect()->route('comments')->with('status', "Your comment has been added");
    }
}

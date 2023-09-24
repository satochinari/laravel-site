<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        // このコントローラーのメソッドはすべて認証が必要
        $this->middleware('auth');
    }

    /**
     * コメント一覧表示
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments/index', compact('comments'));
    }

    /**
     * コメント作成フォーム表示
     * @return \Illuminate\View\View
     */
    public function showCreateForm()
    {
        return view('comments/create');
    }

    /**
     * コメント作成
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->body;

        Auth::user()->comments()->save($comment);

        return redirect()->route('comments.index');
    }
}
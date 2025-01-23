<?php

namespace App\Http\Controllers;

use App\Events\PostCreate;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    /**
     * Write code on Method
     *
     * @return Factory|View|Application|\Illuminate\View\View()
     */
    public function index(Request $request)
    {
        $posts = Post::get();
        return view('posts', compact('posts'));
    }

    /**
     * Write code on Method
     *
     * @return RedirectResponse()
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body
        ]);

        event(new PostCreate($post));

        return back()->with('success','Post created successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $blogs = Blog::with('user')
    ->withCount('comments')
    ->onlyOpen()
    ->orderByDesc('comments_count')
    ->latest('updated_at') // = orderByDesc('updated_at')
    ->get();

    return view('home', compact('blogs'));
  }

  public function show(Blog $blog)
  {
    $blog = Blog::first();
    // $blog->body = ['a', 'b', 'c'];
    // $blog->save();

    return $blog->body->implode('、');

    return 'ok';

    // 非公開のものは見られないように
    // if (!$blog->is_open) {
    //   abort(403);
    // }

    dd($blog->is_open);

    abort_unless($blog->is_open, 403);

    dd($blog);
  }
}

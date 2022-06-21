<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $first_blog = Blog::latest()->first();
        $blogs = Blog::latest()->get();
        return view('blog.main', [
            'first_blog' => $first_blog,
            'blogs' => $blogs,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->keyword;
        $blogs = Blog::where('judul', 'like', '%' . $search . '%')->orWhere('konten', 'like', '%' . $search . '%')->get();
        return view('blog.main', [
            'blogs' => $blogs,
        ]);
    }

    public function read($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('blog.read', [
            'blog' => $blog,
        ]);
    }
}

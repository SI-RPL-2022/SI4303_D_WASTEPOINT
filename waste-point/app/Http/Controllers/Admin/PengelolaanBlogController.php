<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;


class PengelolaanBlogController extends Controller
{
    public function index()

    {
        $number = 1;
        $blogs = Blog::all();
        return view('admin.data_blog', [
            'blogs' => $blogs,
            'number' => $number
        ]);
    }

    public function create()
    {
        return view('admin.tambah_blog');
    }

    public function store(Request $request)
    {
        $Validated = $request->validate([
            'judul' => ['required', 'max:100'],
            'konten' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,svg,PNG,JPG,JPEG', 'max:2048'],

        ]);
        $Validated['slug']=  SlugService::createSlug(Blog::class,'slug', $request->judul);
        $Validated['excerpt']=Str::limit(strip_tags($request->konten),200);


        $Validated['image'] = time() . '.' . $request->image->extension();
        $request->image->move(public_path('blogs'),  $Validated['image']);
        Blog::create($Validated);
        return redirect('/admin/data-blog')->with('create_success', 'Data Blog berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $blogs = Blog::where('id', $id)->get();
        return view('admin.detail_blog', [
            'blogs' => $blogs,
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($request->image != null) {
            $blog_image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blogs'), $blog_image);

            Blog::where('id', $id)->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'image' => $blog_image,
            ]);
        } else {
            Blog::where('id', $id)->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
                
            ]);
        }
        return back()->with('update_success', 'Update data blog berhasil!');
    }

    public function delete($id)
    {
        Blog::where('id', $id)->delete();
        return back()->with('update_success', 'data blog berhasil dihapus');
    }
}

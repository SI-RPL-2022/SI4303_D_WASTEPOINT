<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\User;
use App\Models\Waste;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count_products = Product::all()->count();
        $show_blogs = Blog::latest()->get();
        $count_wastes = Waste::where('status', 'Selesai')->sum('weight');
        $count_users = User::where('is_admin', false)->count();
        return view('home', [
            'count_products' => $count_products,
            'show_blogs' => $show_blogs,
            'count_wastes' => $count_wastes,
            'count_users' => $count_users
            
        ]);
    }

}

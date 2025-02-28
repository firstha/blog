<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomepageController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $categories = Category::with('posts')->take(3)->get();

        return view('frontend.homepage', compact('posts', 'categories'));
    }
}

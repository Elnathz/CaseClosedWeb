<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get();
    $title = 'Post Page';

    if (request('author')) {
        $user = User::where('username', request('author'))->first();
        if ($user) {
            $title = count($user->posts) . ' Article by ' . $user->name;
        }
    }
    if (request('category')) {
        $category = Category::where('slug', request('category'))->first();
        if ($category) {
            $title = 'Category: ' . $category->name;
        }
    }

    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    return view('posts', ['title' => $title, 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

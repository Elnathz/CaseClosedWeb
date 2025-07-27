<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    $posts = [
        [
            'title'     => 'Kasus Pembunuhan Ota Edo',
            'author'    => 'Koichi',
            'date'      => '01 July 2025',
            'content'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit cum culpa consectetur doloribus eveniet dignissimos minima repudiandae, perferendis reiciendis assumenda temporibus et excepturi, tenetur quod est, voluptatem ut? Possimus eveniet, tenetur deleniti est voluptates earum beatae cupiditate iure quam dignissimos eaque sapiente? Commodi qui explicabo iusto voluptatibus voluptate! Esse, quaerat!'
        ],
        [
            'title'     => 'Kasus Penculikan Uka Uka',
            'author'    => 'Elnath',
            'date'      => '02 July 2025',
            'content'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla consectetur odit numquam nemo totam tempora! Cumque, alias aut. Id doloribus similique illo quos saepe est quo neque. Quis quisquam minima deserunt pariatur fugit voluptatum enim obcaecati nemo, est assumenda.'
        ]
    ];
    return view('posts', ['title' => 'Posts Page', 'posts' => $posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

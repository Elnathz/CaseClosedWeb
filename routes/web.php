<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    $posts = [
        [
            'id'        => '1',
            'slug'      => 'judul-artikel-1',
            'title'     => 'Kasus Pembunuhan Ota Edo',
            'author'    => 'Koichi',
            'date'      => '01 July 2025',
            'content'   => 'Kasus pembunuhan Ota Edo mengguncang banyak pihak, memperlihatkan dampak kelam kriminalitas dalam masyarakat. Tragedi ini mengungkap ketidakmampuan pengawasan dan pencegahan, serta dampak emosional besar bagi keluarga korban. Proses hukum yang transparan dan langkah preventif yang lebih efektif sangat diperlukan untuk mencegah kekerasan dan menjaga keselamatan masyarakat.'
        ],
        [
            'id'        => '2',
            'slug'      => 'judul-artikel-2',
            'title'     => 'Kasus Penculikan Oleh Suku Uka Uka',
            'author'    => 'Elnath',
            'date'      => '02 July 2025',
            'content'   => 'Penculikan oleh suku Uka-Uka mengguncang masyarakat, mencerminkan perbedaan besar dalam pandangan budaya dan norma hukum. Tindakan ini mungkin terkait dengan ritual atau tuntutan sosial suku tersebut. Penanganannya memerlukan pendekatan sensitif, mengutamakan keselamatan korban, sambil menghormati budaya lokal dan memastikan pemahaman antar pihak yang terlibat.'
        ]
    ];
    return view('posts', ['title' => 'Posts Page', 'posts' => $posts]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id'        => '1',
            'slug'      => 'judul-artikel-1',
            'title'     => 'Kasus Pembunuhan Ota Edo',
            'author'    => 'Koichi',
            'date'      => '01 July 2025',
            'content'   => 'Kasus pembunuhan Ota Edo mengguncang banyak pihak, memperlihatkan dampak kelam kriminalitas dalam masyarakat. Tragedi ini mengungkap ketidakmampuan pengawasan dan pencegahan, serta dampak emosional besar bagi keluarga korban. Proses hukum yang transparan dan langkah preventif yang lebih efektif sangat diperlukan untuk mencegah kekerasan dan menjaga keselamatan masyarakat.'
        ],
        [
            'id'        => '2',
            'slug'      => 'judul-artikel-2',
            'title'     => 'Kasus Penculikan Oleh Suku Uka Uka',
            'author'    => 'Elnath',
            'date'      => '02 July 2025',
            'content'   => 'Penculikan oleh suku Uka-Uka mengguncang masyarakat, mencerminkan perbedaan besar dalam pandangan budaya dan norma hukum. Tindakan ini mungkin terkait dengan ritual atau tuntutan sosial suku tersebut. Penanganannya memerlukan pendekatan sensitif, mengutamakan keselamatan korban, sambil menghormati budaya lokal dan memastikan pemahaman antar pihak yang terlibat.'
        ]
    ];

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    if(!$post) abort(404);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

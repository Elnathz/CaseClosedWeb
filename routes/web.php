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
            'content'   => 'Kasus pembunuhan Ota Edo mengguncang banyak pihak, memperlihatkan dampak kelam kriminalitas dalam masyarakat. Tragedi ini mengungkap ketidakmampuan pengawasan dan pencegahan, serta dampak emosional besar bagi keluarga korban. Proses hukum yang transparan dan langkah preventif yang lebih efektif sangat diperlukan untuk mencegah kekerasan dan menjaga keselamatan masyarakat.'
        ],
        [
            'title'     => 'Kasus Penculikan Oleh Suku Uka Uka',
            'author'    => 'Elnath',
            'date'      => '02 July 2025',
            'content'   => 'Penculikan oleh suku Uka-Uka mengguncang masyarakat, mencerminkan perbedaan besar dalam pandangan budaya dan norma hukum. Tindakan ini mungkin terkait dengan ritual atau tuntutan sosial suku tersebut. Penanganannya memerlukan pendekatan sensitif, mengutamakan keselamatan korban, sambil menghormati budaya lokal dan memastikan pemahaman antar pihak yang terlibat.'
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

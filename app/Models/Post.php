<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
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
    }

    public static function find($slug)
    {
        return Arr::first(static::all(), fn ($post) => $post['slug'] == $slug) ?? abort(404);
    }
}

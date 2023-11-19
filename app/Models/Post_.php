<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "tittle" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Azzam",
            "body" => " Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto officiis facere quaerat nesciunt minima qui eos incidunt unde, possimus, suscipit mollitia in ratione reiciendis aliquid voluptas optio. Sunt, eius harum."
        ],
        [
            "tittle" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Ezra",
            "body" => "<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla laboriosam ipsa reiciendis corrupti pariatur, consequuntur, esse quaerat animi labore, cumque possimus illo autem facere minima voluptatum recusandae incidunt expedita dolorem modi.</p><p>Dicta excepturi voluptatum neque provident pariatur consequatur distinctio eaque laborum consectetur iure earum quos, repellendus dolor quasi perferendis sed beatae, voluptate quo inventore, laboriosam voluptas iste ad? Et eos distinctio saepe dicta asperiores porro quos quam vitae! Earum voluptatibus illum, commodi iusto sint suscipit possimus? Est dolores totam quam, sapiente non recusandae fugiat alias! Exercitationem ab adipisci officiis blanditiis ex vero porro at possimus natus nulla, sit cum nobis.</p>"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }
    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}

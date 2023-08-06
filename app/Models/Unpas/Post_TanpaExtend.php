<?php

namespace App\Models\Unpas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post 
//extends Model
{
  //use HasFactory;

  private static $bolg_posts = [
    [
      "judul" => "Judul tulisan pertama",
      "slug" => "judul-tulisan-pertama",
      "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae dolore odit quos nisi in, alias consequuntur praesentium temporibus, dolores voluptatem accusamus totam exercitationem veniam libero."
    ],
    [
      "judul" => "Judul tulisan kedua",
      "slug" => "judul-tulisan-kedua",
      "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae dolore odit quos nisi in, alias consequuntur praesentium temporibus, dolores voluptatem accusamus totam exercitationem veniam libero."
    ]
  ];

  public static function allYa(){
    // return self::$bolg_posts;
    return collect(self::$bolg_posts);
  }

  public static function findYa($slug){
    // $posts = self::$bolg_posts;
    // $new_post = [];
    // foreach($posts as $post){
    //   if($post['slug'] === $slug){
    //     $new_post = $post;
    //   }
    // }
    // return $new_post;

    $posts = static::allYa();
    return $posts->firstWhere('slug', $slug);
  }
}

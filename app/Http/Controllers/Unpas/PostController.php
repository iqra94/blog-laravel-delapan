<?php

namespace App\Http\Controllers\Unpas;

use App\Http\Controllers\Controller;
use App\Models\Unpas\UnpasCategory;
use App\Models\Unpas\UnpasPost;
use App\Models\Unpas\UnpasUser;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index(){
    // $posts = UnpasPost::latest();

    // if(request('search')){
    //   $posts->where('title', 'like', '%'.request('search').'%')
    //         ->orWhere('body', 'like', '%'.request('search').'%');
    // }

    $title = '';
    if(request('category')){
      $category = UnpasCategory::firstWhere('slug', request('category'));
      $title = ' in '.$category->name;
    }
    if(request('unpasUser')){
      $unpasUser = UnpasUser::firstWhere('username', request('unpasUser'));
      $title = ' in '.$unpasUser->name;
    }

    return view('unpas-laravel8.posts', [
      'title'=>'All Posts'.$title,
      'active'=>'posts',
      // 'posts'=>UnpasPost::all()
      // 'posts'=>UnpasPost::with(['category', 'unpasUser'])->latest()->get(),
      'posts'=>UnpasPost::latest()->filter(request(['search', 'category', 'unpasUser']))->paginate(7)->withQueryString(),
      // 'posts'=>$posts->get()
    ]);
  }

  public function show(UnpasPost $post){
    // public function show($id){
      return view('unpas-laravel8.post', [
      'title'=>'Single Post',
      'active'=>'posts',
      'post'=>$post
      // 'post'=>UnpasPost::find($id),
    ]);
  }
}

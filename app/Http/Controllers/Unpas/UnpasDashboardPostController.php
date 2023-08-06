<?php

namespace App\Http\Controllers\Unpas;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Unpas\UnpasPost;
use App\Models\Unpas\UnpasCategory;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class UnpasDashboardPostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('unpas-laravel8.unpas-dashboard.posts.index', [
      'posts' => UnpasPost::where('unpas_user_id', auth()->user()->id)->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('unpas-laravel8.unpas-dashboard.posts.create', [
      'category' => UnpasCategory::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // return $request;
    $validateData = $request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|unique:unpas_posts',
      'unpas_category_id' => 'required',
      'body' => 'required',
      'image' => 'image|file|max:1024'
    ]);

    if($request->file('image')){
      $validateData['image'] = $request->file('image')->store('assets/unpas-image');
    }
    
    $validateData['unpas_user_id'] = auth()->user()->id;
    $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

    UnpasPost::create($validateData);
    return redirect('/unpas-dashboard/posts')->with('success', 'New post has been added!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Unpas\UnpasPost  $unpasPost
   * @return \Illuminate\Http\Response
   */
  public function show(UnpasPost $post)
  {
    // return $post;
    return view('unpas-laravel8.unpas-dashboard.posts.show', [
      'post' => $post
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Unpas\UnpasPost  $unpasPost
   * @return \Illuminate\Http\Response
   */
  public function edit(UnpasPost $post)
  {
    return view('unpas-laravel8.unpas-dashboard.posts.edit', [
      'category' => UnpasCategory::all(),
      'post' => $post
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Unpas\UnpasPost  $unpasPost
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, UnpasPost $post)
  {
    $rules = [
      'title' => 'required|max:255',
      'unpas_category_id' => 'required',
      'body' => 'required',
      'image' => 'image|file|max:1024'
    ];

    if($request->slug != $post->slug){
      $rules['slug'] = 'required|unique:unpas_posts';
    }

    $validateData = $request->validate($rules);

    if($request->file('image')){
      if($request->oldImage){
        Storage::delete($request->oldImage);
      }
      $validateData['image'] = $request->file('image')->store('assets/unpas-image');
    }

    $validateData['unpas_user_id'] = auth()->user()->id;
    $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

    UnpasPost::where('id', $post->id)->update($validateData);
    return redirect('/unpas-dashboard/posts')->with('success', 'Post has been Edited!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Unpas\UnpasPost  $unpasPost
   * @return \Illuminate\Http\Response
   */
  public function destroy(UnpasPost $post)
  {
    if($post->image){
      Storage::delete($post->image);
    }
    UnpasPost::destroy($post->id);
    return redirect('/unpas-dashboard/posts')->with('success', 'Post has been deleted!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(UnpasPost::class, 'slug', $request->title);

    return response()->json(['slug' => $slug]);
  }
}

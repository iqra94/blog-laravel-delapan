<?php

namespace App\Http\Controllers\Unpas;

use App\Http\Controllers\Controller;
use App\Models\Unpas\UnpasCategory;
use Illuminate\Http\Request;

class UnpasAdminCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // if(auth()->guest() || auth()->user()->username !== 'kira') abort(403);
    // if(!auth()->check() || auth()->user()->username !== 'kira') abort(403);

    // $this->authorize('unpasIsAdmin');// ini punya Gate

    return view('unpas-laravel8.unpas-dashboard.categories.index', [
      'categories' => UnpasCategory::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Unpas\UnpasCategory  $unpasCategory
   * @return \Illuminate\Http\Response
   */
  public function show(UnpasCategory $unpasCategory)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Unpas\UnpasCategory  $unpasCategory
   * @return \Illuminate\Http\Response
   */
  public function edit(UnpasCategory $unpasCategory)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Unpas\UnpasCategory  $unpasCategory
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, UnpasCategory $unpasCategory)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Unpas\UnpasCategory  $unpasCategory
   * @return \Illuminate\Http\Response
   */
  public function destroy(UnpasCategory $unpasCategory)
  {
      //
  }
}

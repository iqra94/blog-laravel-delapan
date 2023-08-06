<?php

namespace App\Http\Controllers\Unpas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnpasLoginController extends Controller
{
  public function index(){
    return view('unpas-laravel8.unpas-auth.login', [
      'title'=>'Login',
      'active'=>'login',
    ]);
  }

  public function authenticate(Request $request){
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if(Auth::attempt($credentials)){
    // if($credentials){
      $request->session()->regenerate();
      return redirect()->intended('/unpas-dashboard');
    }
    
    return back()->with('loginError', 'Login failed!');
  }

  public function logout(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/unpas-home');
  }
}

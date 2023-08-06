<?php

namespace App\Http\Controllers\Unpas;

use App\Http\Controllers\Controller;
use App\Models\Unpas\UnpasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UnpasRegisterController extends Controller
{
  public function index(){
    return view('unpas-laravel8.unpas-auth.register', [
      'title'=>'Register',
      'active'=>'register',
    ]);
  }

  public function store(Request $request){
    // return request()->all();
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'username' => ['required', 'min:3', 'max:255', 'unique:unpas_users'],
      'email' => 'required|email|unique:unpas_users',
      'password' => 'required|min:5|max:255',
    ]);

    // $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['password'] = Hash::make($validatedData['password']);
    UnpasUser::create($validatedData);
    // $request->session()->flash('success', 'Registration successfull! Please login');
    return redirect('/unpas-login')->with('success', 'Registration successfull! Please login');
  }
}

<?php

namespace App\Http\Controllers\apps;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserViewAccount extends Controller
{
  public function index()
  {
    return view('content.apps.app-user-view-account');
  }

  public function update_password(Request $request)
  {
    $get_password = $request->all();
    // dd($get_password['confirmPassword']);

    User::where('id', Auth::user()->id)->update([
      'password' => Hash::make($get_password['confirmPassword'])
    ]);

    return redirect()->back()->with('password_success', 'Account password changed successfully');
  }
}

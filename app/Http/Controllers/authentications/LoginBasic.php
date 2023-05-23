<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-login', ['pageConfigs' => $pageConfigs]);
  }

  public function check(Request $request)
  {
    $user_input = $request->all();
    $user = User::where('phone_number', "251" . $user_input['email-username'])->first();
    if ($user && Hash::check($user_input['password'], $user->password)) {
      // if (Auth::attempt(['phone_number' => "251" . $user_input['email-username'], 'password' => $user_input['password']])) {
      $userx = Auth::user();
      dd($userx);
      Auth::login($user);
      return redirect()->route('dashboard-analytics');
      // }
    } else {
      dd('Nothing');
    }
  }
}

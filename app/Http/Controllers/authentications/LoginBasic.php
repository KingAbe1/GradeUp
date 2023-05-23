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
    $phone_number = "251" . $user_input['email-username'];
    $password = $user_input['password'];

    $user = User::where('phone_number', $phone_number)->first();
    if ($user && Hash::check($password, $user->password)) {
      if (Auth::attempt(['phone_number' => $phone_number, 'password' => $password])) {
        $user = Auth::user();
        Auth::login($user);
        return redirect()->route('dashboard-analytics');
      }
    } else {
      dd('Nothing');
    }
  }
}

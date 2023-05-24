<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

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

    $user = User::join('roles', 'users.role_id', 'roles.id')->where('phone_number', $phone_number)->first();
    if ($user && Hash::check($password, $user->password)) {
      if (Auth::attempt(['phone_number' => $phone_number, 'password' => $password])) {
        $xuser = Auth::user();
        Auth::login($xuser);
        // View::share('role_name', $user->name);
        return redirect('/');
      }
    } else {
      return redirect()->route('auth-login');
    }
  }
}

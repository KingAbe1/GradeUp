<?php

namespace App\Http\Controllers\authentications;

use Carbon\Carbon;
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
    $phone_number = $user_input['email-username'];
    $password = $user_input['password'];

    $user = User::where('phone_number', $phone_number)->select('*')->first();
    if ($user && Hash::check($password, $user->password)) {
      if (Auth::attempt(['phone_number' => $phone_number, 'password' => $password])) {

        $now = Carbon::now();
        $get_created_date = User::where('id', $user->id)->select('created_at')->get()->toArray();
        $date_to_be_expired = Carbon::parse($get_created_date[0]['created_at']);
        $date_to_be_expired->addDays(14);

        $date_diff = $now->diffInDays($date_to_be_expired);
        // dd($date_diff);

        if ($date_diff == 0) {
          User::where('id', $user->id)->update([
            'plan_trail' => null
          ]);
        } else {
          if ($user->plan_trail != $date_diff) {
            User::where('id', $user->id)->update([
              'plan_trail' => $date_diff
            ]);
          }
        }

        $xuser = Auth::user();
        Auth::login($xuser);
        return redirect('/');
      }
    } else {
      return redirect()->route('auth-login');
    }
  }
}

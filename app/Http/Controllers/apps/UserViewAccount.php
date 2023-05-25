<?php

namespace App\Http\Controllers\apps;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserViewAccount extends Controller
{
  public function index()
  {
    $current_plans = User::join('plans', 'users.plan', 'plans.id')->where('users.id', Auth::user()->id)->get()->toArray();
    return view('content.apps.app-user-view-account', [
      'plans' => Plan::all(),
      'current_plans' => $current_plans
    ]);
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

  public function update_info(Request $request, User $id)
  {
    $updated_info = $request->all();

    if (Auth::user()->id == 1) {
      $id->update([
        'user_name' => $updated_info['modalEditUserName'],
        'first_name' => $updated_info['modalEditUserFirstName'],
        'last_name' => $updated_info['modalEditUserLastName'],
        'email' => $updated_info['modalEditUserEmail'],
        'phone_number' => $updated_info['modalEditUserPhone']
      ]);
    } else {
      $id->update([
        'user_name' => $updated_info['modalEditUserName'],
        'first_name' => $updated_info['modalEditUserFirstName'],
        'last_name' => $updated_info['modalEditUserLastName'],
        'email' => $updated_info['modalEditUserEmail'],
        'phone_number' => $updated_info['modalEditUserPhone'],
        'grade' => $updated_info['grade'],
        'school_name' => $updated_info['multiStepsSchool'],
        'region' => $updated_info['multiStepsCity']
      ]);
    }



    return redirect()->back()->with('profile_setting', 'Account updated successfully');
  }
}

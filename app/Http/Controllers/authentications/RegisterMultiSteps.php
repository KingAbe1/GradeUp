<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterMultiSteps extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-register', ['pageConfigs' => $pageConfigs]);
  }
  public function store(Request $request)
  {
    $user = $request->all();

    // dd($user);
    User::create([
      'user_name' => $user['multiStepsUsername'],
      'first_name' => $user['multiStepsFirstName'],
      'last_name' => $user['multiStepsLastName'],
      'phone_number' => $user['multiStepsMobile'],
      'email' => $user['multiStepsEmail'],
      'school_name' => $user['multiStepsSchool'],
      'grade' => $user['grade'],
      'region' => $user['multiStepsCity'],
      'plan' => $user['customRadioIcon'],
      'plan_trail' => '15',
      'password' => Hash::make($user['multiStepsPass'])
    ]);

    return redirect()->route('auth-login');
  }
}

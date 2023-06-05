<?php

namespace App\Http\Controllers\authentications;

use App\Models\Plan;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterMultiSteps extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-register', ['pageConfigs' => $pageConfigs, 'plans' => Plan::all()]);
  }
  public function teachindex()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-teach-register', ['pageConfigs' => $pageConfigs, 'plans' => Plan::all()]);
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
      'status' => '1',
      'role_id' => 2,
      'password' => Hash::make($user['multiStepsPass'])
    ]);

    return redirect()->route('auth-login');
  }

  public function store_teacher(Request $request)
  {
    $user = $request->all();
    if ($request->file('tempo')) {
      $path = Storage::put('tempo', $request->file('tempo'));
    } else {
      $path = null;
    }
    // dd($request, $path);

    $id = User::create([
      'user_name' => $user['multiStepsUsername'],
      'first_name' => $user['multiStepsFirstName'],
      'last_name' => $user['multiStepsLastName'],
      'phone_number' => $user['multiStepsMobile'],
      'email' => $user['multiStepsEmail'],
      'region' => $user['multiStepsCity'],
      'status' => '0',
      'role_id' => 3,
      'password' => Hash::make($user['multiStepsPass'])
    ]);

    Teacher::create([
      'user_id' => $id->id,
      'multiStepsTeachBefore' => $user['multiStepsTeachBefore'],
      'grade' => $user['grade'],
      'multiStepsSchool' => $user['multiStepsSchool'],
      'grade_future' => $user['grade_future'],
      'choice_education' => $user['choice_education'],
      'educational_level' => $user['educational_level'],
      'graduation_subject' => $user['graduation_subject'],
      'uni_coll_name' => $user['uni_coll_name'],
      'up_temp' => $path
    ]);

    return redirect()->route('auth-login');
  }

  public function checker(Request $request)
  {
    $user_name = User::where('user_name', $request['user_name'])->count();
    $email = User::where('email', $request['email'])->count();

    return response()->json(['username' => $user_name, 'email' => $email]);
  }

  public function phone_checker(Request $request)
  {
    $phone = User::where('phone_number', $request['phone'])->count();

    return response()->json(['phone' => $phone]);
  }
}
<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Ecommerce extends Controller
{
  public function index()
  {
    $current_plans = User::join('plans', 'users.plan', 'plans.id')->where('users.id', Auth::user()->id)->get()->toArray();

    return view('content.dashboard.dashboards-ecommerce', [
      'current_plans' => $current_plans
    ]);
  }
}

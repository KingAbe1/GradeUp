<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserList extends Controller
{
  public function index()
  {
    return view('content.apps.app-user-list', [
      'total_users' => User::join('roles', 'users.role_id', 'roles.id')->join('plans', 'users.plan', 'plans.id')->where('role_id', '!=', 1)->select('users.id as id', 'users.email as email', 'users.profile_photo_url as profile_photo_url', 'users.first_name as first_name', 'users.last_name as last_name', 'roles.name as role_name', 'plans.name as plan_name', 'users.status as status', 'users.plan_trail as trail')->get(),
      'teachers' => User::where('role_id', 3)->get()->toArray(),
      'students' => User::where('role_id', 2)->get()->toArray(),
      'newcomers' => User::where('role_id', '!=', 1)->where('created_at', now()->format('Y-m-d'))->get()->toArray()
    ]);
  }
}
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
      'total_users' => User::where('role_id', '!=', 1)->get()->toArray(),
      'teachers' => User::where('role_id', 3)->get()->toArray(),
      'students' => User::where('role_id', 2)->get()->toArray(),
      'newcomers' => User::where('role_id', '!=', 1)->where('created_at', now()->format('Y-m-d'))->get()->toArray()
    ]);
  }
}

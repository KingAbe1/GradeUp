<?php

namespace App\Http\Controllers\pages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfile extends Controller
{
  public function index(User $id)
  {
    return view('content.pages.pages-profile-user', [
      'profile_infos' => User::where('role_id', '!=', 1)->where('id', $id->id)->get(),
      'roles' => User::join('roles', 'users.role_id', 'roles.id')->where('users.id', $id->id)->get()
    ]);
  }
}
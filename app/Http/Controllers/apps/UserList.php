<?php

namespace App\Http\Controllers\apps;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserList extends Controller
{
  public function index()
  {
    return view('content.apps.app-user-list', [
      'user_lists' => User::join('roles', 'users.role_id', 'roles.id')->where('role_id', '!=', 1)->select('users.id as id', 'users.email as email', 'users.phone_number as phone', 'users.region as region', 'users.profile_photo_url as profile_photo_url', 'users.first_name as first_name', 'users.last_name as last_name', 'roles.name as role_name', 'users.status as status', 'users.plan_trail as trail', 'users.created_at as created_at')->get(),
      'teachers' => User::where('role_id', 3)->get()->toArray(),
      'students' => User::where('role_id', 2)->get()->toArray(),
      'newcomers' => User::where('role_id', '!=', 1)->where('created_at', 'Like', '%' . Carbon::today()->format('Y-m-d') . '%')->get()->toArray(),
      'total' => User::where('role_id', '!=', 1)->count()
    ]);
  }

  public function update(User $id)
  {
    // dd($id->status);

    if ($id->status == '1') {
      User::where('id', $id->id)->update([
        'status' => '0'
      ]);
    } else {
      User::where('id', $id->id)->update([
        'status' => '1'
      ]);
    }

    return redirect()->back()->with('user_status', 'User status changed successfully');
  }
}
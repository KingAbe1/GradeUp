<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $password = Hash::make('password');
    User::create([
      'user_name' => 'KingAbe1',
      'first_name' => 'Abel',
      'last_name' => 'Legesse',
      'email' => 'abellegesse123@gmail.com',
      'phone_number' => '251947431170',
      'status' => '1',
      'role_id' => 1,
      'password' => $password
    ]);
  }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
  public function run() {
    // User for mobile app.
    $mobileUser = User::create([
      'email' => User::APP_USER_MAIL,
      'password' => Hash::make(env('MOBILE_USER_PASSWORD')),
      'name' => 'application-user',
    ]);

    // Root account
    $rootUser = User::create([
      'email' => 'admin@albaniabest.com',
      'password' => Hash::make(env('ROOT_PASSWORD')),
      'name' => 'application-root',
    ]);

    Role::where('user_id', '=', $mobileUser->id)->update(['role' => Role::ROLE_APP]);
    Role::where('user_id', '=', $rootUser->id)->update(['role' => Role::ROLE_ROOT]);
  }

}

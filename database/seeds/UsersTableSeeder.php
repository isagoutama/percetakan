<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = "Admin Utama";
      $user->username = "super.admin";
      $user->role = "admin";
      $user->email = "admin@email.com";
      $user->password = bcrypt("12345678");
      $user->save();

      $user = new User();
      $user->name = "Client 1";
      $user->username = "client123";
      $user->role = "client";
      $user->email = "client@email.com";
      $user->password = bcrypt("12345678");
      $user->save();
    }
}

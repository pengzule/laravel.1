<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->truncate();

   
      User::create([
        'name'   => 'admin',
        'email'    => 'pengzule@163.com',
        'password'    => Hash::make('123456'),
        'is_admin' => 1,
      ]);
    
  }

}

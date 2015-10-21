<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Thin Nguyen Truong',
            'email' => 'truongthinnguyen@gmail.com',
            'password' => Hash::make('123456')
        ));
    }
}

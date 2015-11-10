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
        /*
         * role: 1 => admin
         * role: 2 => user
         */

        DB::table('users')->delete();
        User::create(array(
            'name' => 'Thin Nguyen Truong',
            'email' => 'truongthinnguyen@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 1
        ));

        User::create(array(
            'name' => 'Ratione Deserunt',
            'email' => 'ratione_deserunt@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 2
        ));
    }
}

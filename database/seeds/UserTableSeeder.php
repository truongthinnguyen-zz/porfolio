<?php

use App\User;
use App\Role;
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
        $roles = Role::lists('id')->all();

        DB::table('users')->delete();
        User::create(array(
            'name' => 'Thin Nguyen Truong',
            'email' => 'truongthinnguyen@gmail.com',
            'password' => Hash::make('123456')
        ));

        User::create(array(
            'name' => 'Tester',
            'email' => 'test@gmail.com',
            'password' => Hash::make('123456')
        ));

        $users = User::all();
        foreach($users as $user){
            if($user->email === 'truongthinnguyen@gmail.com'){
                DB::table('user_role_pivot')->insert(array(
                    array('user_id' => $user->id, 'role_id' => $roles[0])
                ));
            }
            else{
                DB::table('user_role_pivot')->insert(array(
                    array('user_id' => $user->id, 'role_id' => $roles[1])
                ));
            }

        }
    }
}

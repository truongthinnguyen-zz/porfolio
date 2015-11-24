<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(array(
            'name' => 'admin',
            'description' => 'Administrator'
        ));

        Role::create(array(
            'name' => 'viewer',
            'description' => 'Viewer'
        ));
    }
}

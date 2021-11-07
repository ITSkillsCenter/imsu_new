<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['lecturer'];

        foreach($roles as $role){
            $existingRole = Role::where('name', $roles)->first();

            if(!$existingRole){
                Role::create([
                    'name' => $role,
                    'display_name' => ucfirst($role),
                    'description' => ucfirst($role).' Role',
                ]);
            }
        }
    }
}

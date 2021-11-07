<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturerPermissions = ['lecturer-read', 'lecturer_module-read','lecturerAssignCourse-edit','lecturerAssignedCourses-read'];

        foreach($lecturerPermissions as $lecturerPermission){
            $previousePermision = Permission::where('name',$lecturerPermission)->first();

            if(!$previousePermision){
                Permission::create([
                    'name' => $lecturerPermission,
                    'description' => ucfirst($lecturerPermission),
                    'display_name' => ucfirst($lecturerPermission)
                ]);
            }
        }
    }
}

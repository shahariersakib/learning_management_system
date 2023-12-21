<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'course-list',
           'course-create',
           'course-edit',
           'course-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'exam-list',
           'exam-create',
           'exam-edit',
           'exam-delete',
           'qustion-list',
           'qustion-create',
           'qustion-edit',
           'qustion-delete',
           'website-list',
           'live-list',
           'live-create',
           'live-edit',
           'live-delete',
           'syllabus-list',
           'syllabus-create',
           'syllabus-edit',
           'syllabus-delete',
           'routine-list',
           'routine-create',
           'routine-edit',
           'routine-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
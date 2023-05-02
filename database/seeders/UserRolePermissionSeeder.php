<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::beginTransaction();
        try{
            $manager = User::create([
                'name' => 'Dicky D',
                'username' => 'dickyd29',
                'password' => '$2y$10$zRoMj4RpFPGjxdTEkWn80uaDZGX8eZIoDjzbTdKKYp6MgoIOcMGWq'
            ]);
    
            $staff = User::create([
                'name' => 'Sanny Daffa',
                'username' => 'sanny123',
                'password' => '$2y$10$zRoMj4RpFPGjxdTEkWn80uaDZGX8eZIoDjzbTdKKYp6MgoIOcMGWq'
            ]);
    
            $role_staff = Role::create(['name' => 'staff']);
            $role_manager = Role::create(['name' => 'manager']);
    
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);
    
            $staff->assignRole('staff');
            $manager->assignRole('manager');
            $manager->assignRole('staff');

            DB::commit();
        }catch(\Throwable $th){
            DB::rollBack();
        }
        
    }
}

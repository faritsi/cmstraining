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
                'name' => 'Dicky Darmawan',
                'username' => 'dickyd2909',
                'password' => '$2y$10$zRoMj4RpFPGjxdTEkWn80uaDZGX8eZIoDjzbTdKKYp6MgoIOcMGWq'
            ]);
            $it = User::create([
                'name' => 'Fadillah muammar',
                'username' => 'fadil123',
                'password' => '$2y$10$zRoMj4RpFPGjxdTEkWn80uaDZGX8eZIoDjzbTdKKYp6MgoIOcMGWq'
            ]);
            $staff = User::create([
                'name' => 'Sanny Daffa',
                'username' => 'sanny123',
                'password' => '$2y$10$zRoMj4RpFPGjxdTEkWn80uaDZGX8eZIoDjzbTdKKYp6MgoIOcMGWq'
            ]);
    
            
            $role_manager = Role::create(['name' => 'manager']);
            $role_it = Role::create(['name' => 'it']);
            $role_staff = Role::create(['name' => 'staff']);
            
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);
    
            $role_manager->givePermissionTo('read role');
            $role_manager->givePermissionTo('create role');
            $role_manager->givePermissionTo('update role');
            $role_manager->givePermissionTo('delete role');

            $staff->assignRole('staff');
            $manager->assignRole('manager');
            $it->assignRole('it');

            DB::commit();
        }catch(\Throwable $th){
            DB::rollBack();
        }
        
    }
}

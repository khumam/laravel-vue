<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $role = null;
        // $permission = null;
        // for ($i=0; $i < 2; $i++) { 
        //     switch ($i) {
        //         case 1:
        //             $role = Role::create(['name' => 'petugas']);
        //             $permission = Permission::create(['name' => 'index transaction']);

        //             $role->givePermissionTo($permission);
        //             $permission->assignRole($role);
        //             break;
                
        //         default:
        //             $role = Role::create(['name' => 'admin']);
        //             $permission = Permission::create(['name' => 'index all']);

        //             $role->givePermissionTo($permission);
        //             $permission->assignRole($role);
        //             break;
        //     }
        // }

        $users = User::where('id', '<', 5)->get();

        foreach ($users as $key => $value) {
            if ($value->id == 1) {
                $value->assignRole('admin');
            }
            else{
                $value->assignRole('petugas');
            }
        }

    //     $roles = Role::create(['name' => 'admin', 'name'=> 'petugas']);
    //     $permissions = Permission::create(['name' => 'index all', 'name'=>'index transaction']);

    //     $roles->syncPermissions($permissions);
    //     $permissions->syncRoles($roles);
    }
}

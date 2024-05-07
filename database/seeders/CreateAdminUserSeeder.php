<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'BHAKORADMIN',
            'last_name' => 'BHAKORADMIN',
            'username' => 'bhakoradmin',
            'email' => 'bhakor@gmail.com',
            'phone_number' => '123456789',

            'address' => 'bhakor',
            'usertype_id' => '1',
            'location_id' => '13',
            'password' => bcrypt('12345678')

        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}

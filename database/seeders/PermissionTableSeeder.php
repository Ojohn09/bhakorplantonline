<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'attendance-list',
              'attendance-create',
              'coblog-list',
                'coblog-create',
                'coblog-edit',
                'coblog-delete',
               'incoming-list',
                'incoming-create',
                'incoming-edit',
                'incoming-delete',
                'inventory-list',
                'location-list',
                'location-create',
                'location-edit',
                'location-delete',
                'pos-list',
                'pos-create',
                'pos-print',
                'supplier-list',
                'supplier-create',
                'supplier-edit',
                'supplier-delete',
                'user-list',
                'user-create',
                'user-edit',
                'user-delete',
                'usertype-list',
                'usertype-create',
                'usertype-edit',
                'usertype-delete',
                'customer-list',
                'customer-create',
                'customer-edit',
                'customer-delete',
                'databasesync-list',
                'databasesync-create',
                



        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

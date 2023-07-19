<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            
            // category
            'create category',
            'view category',
            'edit category',
            'delete category',
            
            // product
            'create product',
            'view product',
            'edit product',
            'delete product',     
            
            // product-photo
            'create product-photo',
            'view product-photo',
            'edit product-photo',
            'delete product-photo',   

            // product-detail
            'create product-detail',
            'view product-detail',
            'edit product-detail',
            'delete product-detail',   

            // customer
            'create customer',
            'view customer',
            'edit customer',
            'delete customer', 

            // staff
            'create staff',
            'view staff',
            'edit staff',
            'delete staff', 

            // order 
            'view order',
            'create order',
            'edit order',
            'delete order', 

            //permission
            'edit permission',

            //account
            'update account'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Permission::create(['name' => '']);
    }
}

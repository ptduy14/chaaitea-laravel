<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleStaff = Role::create(['name' => 'staff']);
        $roleCustomer = Role::create(['name' => 'customer']);

        $permissionsAdmin = [
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
            'edit order',
            'delete order', 

            //permission
            'edit permission'
        ];
        
        $permissionsStaff = [
            // category
            'view category',
            
            // product
            'view product',   
            
            // product-photo
            'view product-photo',

            // product-detail
            'view product-detail',  

            // customer
            'view customer',

            // staff
            'view staff',

            // order 
            'edit order',
            'view order'
        ];

        $permissionsCustomer = [
            // category
            'view category',
            
            // product
            'view product',   
            
            // product-photo
            'view product-photo',

            // product-detail
            'view product-detail',  

            // order 
            'create order',
            'edit order',
            'view order',

            //account
            'update account'
        ];

        $roleAdmin->syncPermissions($permissionsAdmin);
        $roleStaff->syncPermissions($permissionsStaff);
        $roleCustomer->syncPermissions($permissionsCustomer);
    }
}

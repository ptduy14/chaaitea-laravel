<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Phan Tan Duy',
            'email' => 'customer@gmail.com',
            'phone' => null,
            'address' => 'CanTho',
            'gender' => 1,
            'password' => '123',
            'verify' => 1
        ])->assignRole('customer');
    }
}

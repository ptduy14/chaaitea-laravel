<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Phan Tan Duy',
            'email' => 'duypt12',
            'phone' => null,
            'address' => null,
            'gender' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('admin');
    }
}

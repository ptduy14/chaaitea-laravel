<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'staff',
            'phone' => null,
            'address' => null,
            'gender' => 1,
            'password' => bcrypt('123'),
        ])->assignRole('staff');
    }
}

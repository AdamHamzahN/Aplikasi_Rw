<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class akunAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admins = [
            [
                'username' => 'admin1',
                'password' => Hash::make(123456),
                'role' => 'Admin',
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make(123456),
                'role' => 'Super Admin',
            ],
        ];
        foreach ($admins as $admin) {
            DB::table('admins')->insert($admin);
        }
    }
}

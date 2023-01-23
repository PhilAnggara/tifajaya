<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Serwin Rumagit',
            'username' => 'serwinrumagit',
            'email' => 'serwinrumagit@gmail.com',
            'telp' => '081234567890',
            'role' => 'Admin',
            'password' => Hash::make('Admin123')
        ]);
        User::create([
            'name' => 'Phil Anggara',
            'username' => 'philanggara',
            'email' => 'philanggara@gmail.com',
            'telp' => '081234567891',
            'role' => 'Kepala Seksi',
            'password' => Hash::make('Admin123')
        ]);
        User::create([
            'name' => 'Angga Bawole',
            'username' => 'anggabawole',
            'email' => 'anggabawole@gmail.com',
            'telp' => '081234567892',
            'role' => 'Kepala Lab',
            'password' => Hash::make('Admin123')
        ]);
    }
}

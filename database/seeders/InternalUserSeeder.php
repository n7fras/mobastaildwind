<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InternalUser; // Pastikan menggunakan model dengan PascalCase

class InternalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InternalUser::create([
            'username' => 'Super admin',
            'role' => 'Super Admin',
            'name' => 'Super Admin',
            'email' => 'z8lDy@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Contoh',
            'status' => true,
            'password' => bcrypt('password!@#'),
            'foto' => null
        ]);
    }
    
}
class SalesTableSeeder extends Seeder
{
    public function run()
    {
        Sales::create([
            'product_name' => 'Product A',
            'quantity' => 10,
            'amount' => 500.00,
            'sale_date' => '2025-01-01',
        ]);

        Sales::create([
            'product_name' => 'Product B',
            'quantity' => 5,
            'amount' => 300.00,
            'sale_date' => '2025-01-01',
        ]);

        // Tambah data lainnya sesuai kebutuhan
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // Import the User model
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Doaass',
            'email' => 'doaass@example.com',
            'password' => bcrypt('password123'), // Use a hashed password
        ]);

        Customer::create([
            'user_id' => $user->id,
            'name' => 'Doaa Customer',
            'email' => 'doaa.customer@example.com',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;            // Import the User model
use App\Models\DeliveryAgent;  // Import the DeliveryAgent model

class DeliveryAgentSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Agent Namess',
            'email' => 'agentss@example.com',
            'password' => bcrypt('password123'), // Use a hashed password
        ]);

        DeliveryAgent::create([
            'user_id' => $user->id,
            'name' => 'Delivery Agent',
            'email' => 'agent@example.com',
        ]);
    }
}

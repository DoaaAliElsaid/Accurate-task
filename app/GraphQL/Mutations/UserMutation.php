<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GraphQL\Error\Error;

class UserMutation
{
    // Create a new user
    public function createUser($root, array $args)
    {
        // $user = Auth::user(); // Ensure user is authenticated

        // if (!$user) {
        //     throw new \Exception('Unauthorized');
        // }
        // Validate input data
        $validator = Validator::make($args, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            throw new Error('Validation failed: ' . implode(', ', $validator->errors()->all()));
        }

        // Create the user
        return User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => Hash::make($args['password']),
        ]);
    }

    // Update an existing user
    public function updateUser($root, array $args)
    {
        // $user = Auth::user(); // Ensure user is authenticated

        // if (!$user) {
        //     throw new \Exception('Unauthorized');
        // }
        $user = User::find($args['id']);
        
        if (!$user) {
            throw new Error('User not found');
        }

        $user->update(array_filter([
            'name' => $args['name'] ?? null,
            'email' => $args['email'] ?? null,
            'password' => isset($args['password']) ? Hash::make($args['password']) : null,
        ]));

        return $user;
    }

    // Delete an existing user
    public function deleteUser($root, array $args)
    {
        $user = Auth::user(); // Ensure user is authenticated

        if (!$user) {
            throw new \Exception('Unauthorized');
        }
        $user = User::find($args['id']);
        
        if (!$user) {
            throw new Error('User not found');
        }

        return $user->delete();
    }
}

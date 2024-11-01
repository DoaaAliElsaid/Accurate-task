<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Str;

class LoginMutation
{
    public function __invoke($rootValue, array $args, $context, ResolveInfo $resolveInfo)
    {
        
        $user = User::where('email', $args['email'])->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($args['password'], $user->password)) {
            throw new \Exception('Invalid credentials');
        }

        // Create a token for the user
        $token = $user->createToken('authToken')->plainTextToken;

        // Return user information along with the token
        return [
            'id' => $user->id,
            'name' => $user->name,
            'token' => $token,
        ];
    }
}

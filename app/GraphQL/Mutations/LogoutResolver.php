<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use GraphQL\Type\Definition\ResolveInfo;

class LogoutResolver
{
    public function __invoke($rootValue, array $args, $context, ResolveInfo $resolveInfo)
    {
        // Ensure the user is authenticated
        $user = Auth::guard('custom')->user();

        if ($user) {
            // Revoke the user's token
            $user->tokens()->delete(); // This will delete all tokens for the user
            
            return $user; // You can return the user or any other response you want
        }

        throw new \Exception('Unauthenticated');
    }
}

<?php

namespace App\GraphQL\Queries;

use App\Models\User;

class UserQuery
{
    // Get all users
    public function allUsers($root, array $args)
    {
        // $user = Auth::user(); // Ensure user is authenticated

        // if (!$user) {
        //     throw new \Exception('Unauthorized');
        // }
        return User::all();
    }

    // Get a single user by ID
    public function singleUser($root, array $args)
    {
        // $user = Auth::user(); // Ensure user is authenticated

        // if (!$user) {
        //     throw new \Exception('Unauthorized');
        // }
        return User::find($args['id']);
    }
}

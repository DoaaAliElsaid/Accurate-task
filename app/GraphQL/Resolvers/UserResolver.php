<?php
// app/GraphQL/Resolvers/UserResolver.php

namespace App\GraphQL\Resolvers;

use App\Models\User;

class UserResolver
{
    /**
     * Resolve the account field for a user.
     *
     * @param  User  $user
     * @return mixed
     */
    public function resolveAccount(User $user)
    {
        // Logic to determine if the user is a Customer or a DeliveryAgent
        if ($user->isCustomer()) {
            return $user->customer; // Assuming 'customer' is a relationship
        }

        if ($user->isDeliveryAgent()) {
            return $user->deliveryAgent; // Assuming 'deliveryAgent' is a relationship
        }

        return null;
    }
}

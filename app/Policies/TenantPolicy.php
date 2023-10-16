<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TenantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can make a payment.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function makePayment(User $user)
    {
        // Add your logic here to determine if the user can make a payment.
        // For example, you can check if the user's role is 'tenant'.
        return $user->role === 'tenant';
    }

    /**
     * Determine whether the user can view rooms.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewRooms(User $user)
    {
        // Add your logic here to determine if the user can view rooms.
        // For example, you can check if the user's role is 'tenant'.
        return $user->role === 'tenant';
    }
}


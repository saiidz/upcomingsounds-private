<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Order $order)
    {
        return $user->id === $order->invoice->bid->user_id
            ? Response::allow()
            : Response::deny('You do not own this Order.');
    }
}

<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class InvoicePolicy
{
    use HandlesAuthorization;

    public function showInvoice(User $user, Invoice $invoice)
    {
        return $user->id === $invoice->bid->user_id
            ? Response::allow()
            : Response::deny('You do not own this Invoice.');
    }
}

<?php

namespace App\Templates;

interface IStatus
{

    const COMPLETED     = 'completed';
    const PENDING     = 'pending';
    const CANCELLED     = 'cancelled';

    const CREDIT_FOR_CURATOR = 10;

    const HISTORY_WITHDRAWAL = 'history_withdrawal';
    const OFFER_PAYMENTS = 'offer_payments';
    const REFERRAL_PAYMENTS = 'referral_payments';

}

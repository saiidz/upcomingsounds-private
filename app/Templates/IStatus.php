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
    const Submit_Coverage_History = 'submit_coverage_history';

    const PAYPAL = 'paypal';
    const WISE = 'wise';

    const PAID = 'paid';

    const IS_ACTIVE = 1;
    const IS_APPROVED = 1;
}

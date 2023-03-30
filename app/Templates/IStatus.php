<?php

namespace App\Templates;

interface IStatus
{

    const COMPLETED     = 'completed';
    const PENDING     = 'pending';
    const CANCELLED     = 'cancelled';

    const CREDIT_FOR_CURATOR = 10;
}

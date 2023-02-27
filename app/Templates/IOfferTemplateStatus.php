<?php

namespace App\Templates;

interface IOfferTemplateStatus
{
    const APPROVED = 'APPROVED';
    const PENDING = 'PENDING';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';
    const EXPIRED = 'EXPIRED';
    const ALTERNATIVE = 'ALTERNATIVE';
    const COMPLETED = 'COMPLETED';
    const NEW = 'NEW';
    const TYPE_OFFER = 'OFFER';
    const TYPE_DIRECT_OFFER = 'DIRECT_OFFER';
    const IS_ACTIVE = 1;

    const PAID = 'PAID';
    const REFUND = 'REFUND';

    const USC_FEE_COMMISSION_ADMIN = 2;

}

<?php

namespace App\Templates;

interface IOfferTemplateStatus
{
    const PENDING = 'PENDING';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';
    const EXPIRED = 'EXPIRED';
    const ALTERNATIVE = 'ALTERNATIVE';
    const COMPLETED = 'COMPLETED';
    const NEW = 'NEW';
}

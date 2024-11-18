<?php

namespace App\Templates;

abstract class IPackages
{
    const STANDARD          = 'Standard';
    const ADVANCED_FEATURED = 'Advanced';
    const PRO               = 'Pro';
    const PREMIUM           = 'Premium';

    const STANDARD_USC          = '45';
    const ADVANCED_FEATURED_USC = '60';
    const PRO_USC               = '80';
    const PREMIUM_USC           = '100';

    const STANDARD_NAME          = 'standard';
    const ADVANCED_FEATURED_NAME = 'advanced';
    const PRO_NAME               = 'pro';
    const PREMIUM_NAME           = 'premium';

    const ADD_DAYS               = 7;
    const ADD_BANNER             = 1;
    const REMOVE_BANNER          = 0;

    const STANDARD_PRICE          = 49.00;
    const PLUS_PRICE               = 99.00;
    const POPULAR_PRICE          = 199.00;
    const PREMIUM_PRICE           = 390.00;
    const PLATINUM_PRICE           = 780.00;
    const ONE_USE_PRICE           = 1;
}

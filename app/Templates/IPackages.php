<?php

namespace App\Templates;

abstract class IPackages
{
    const STANDARD          = 'Standard 45 USC';
    const ADVANCED_FEATURED = 'Advanced 60 USC';
    const PRO               = 'Pro 80 USC';
    const PREMIUM           = 'Premium 100 USC';

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
}

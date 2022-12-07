<?php

namespace App\Templates;

abstract class IPackages
{
    const STANDARD          = 'Standard - 45 DAYS 45 USC';
    const ADVANCED_FEATURED = 'Advanced-featured 45 DAYS 60 USC';
    const PRO               = 'Pro - top placement 45 DAYS 80 USC';
    const PREMIUM           = 'Premium banner + top placement 45 DAYS 100 USC';

    const STANDARD_USC          = '45';
    const ADVANCED_FEATURED_USC = '60';
    const PRO_USC               = '80';
    const PREMIUM_USC           = '100';

    const STANDARD_NAME          = 'standard';
    const ADVANCED_FEATURED_NAME = 'advanced';
    const PRO_NAME               = '';
    const PREMIUM_NAME           = 'premium';
}

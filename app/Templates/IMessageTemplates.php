<?php

namespace App\Templates;

use Illuminate\Support\Facades\Auth;

/**
 * @package App\Templates
 * @var IMessageTemplates
 */

 interface IMessageTemplates
 {
    const STORECURATORTAG                 =   'Feature Tag Created Successfully';
    const DELETECURATORTAG                =   'Feature Tag Deleted Successfully';
    const CURATORVERIFICATIONMESSAGE      =   'Thank you for applying. By clicking apply, you agree to our terms and conditions and confirm you have permission to create offers and manage the platform you are submitting to get verified on. Once your application has been fully assessed, we will contact you with our decision.';
    const CURATORVERIFYMESSAGE            =   'Congratulation, You are verfied. Thanks for join UpcomingSounds.';
    const CURATORREJECTEDMESSAGE          =   'Your verification is rejected. Please re-submit your verification form. You have only three chance for submit verification. Thanks for join UpcomingSounds.';
    const CURATORREJECTEDCOMPLETEDMESSAGE =   'Your verification is rejected. You have completed three chance. Thanks for join UpcomingSounds.';
    const DELETEIMGPDF                    =   'Image/Pdf Deleted Successfully';
 }

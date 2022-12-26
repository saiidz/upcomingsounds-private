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

    const STANDARD_DEC                    =   '45 days of basic coverage and exposure on upcomingsounds.com to: *Influencers, media, and curators. If you choose media coverage and social media exposure. *Blogger, Podcast, Record label. if you choose Establish my Professorial Music Career. *Manager, publisher, record label, mentor, sync, sound expert. If you choose to Receive Detailed Advice. -Receive free placements from all curators as well as paid offers from influential curators/influencers. -Additionally, you may submit to your choice of curators/influencers for extra credit - Live reporting from publications.In case no offers are received from publications, a free coupon will be provided.';
    const ADVANCED_DEC                    =   '45 days of featured coverage and exposure on upcomingsounds.com to: Trending section with 50% to 65% more visibility *Influencers, media, and curators. If you choose media coverage and social media exposure. *Blogger, Podcast, Record label. if you choose Establish my Professorial Music Career. *Manager, publisher, record label, mentor, sync, sound expert. If you choose to Receive Detailed Advice. -Receive free placements from all curators as well as paid offers from influential curators/influencers. -Additionally, you may submit to your choice of curators/influencers for extra credit - Live reporting from publications. In case no offers are received from publications, a free coupon will be provided.';
    const PRO_DEC                         =   '45 days of featured coverage and exposure on upcomingsounds.com to: Top Dashboard section with a large thumbnail display with 70% to 80 % more visibility *Influencers, media, and curators. If you choose media coverage and social media exposure. *Blogger, Podcast, Record label. if you choose Establish my Professorial Music Career. *Manager, publisher, record label, mentor, sync, sound expert. If you choose to Receive Detailed Advice. -Receive free placements from all curators as well as paid offers from influential curators/influencers. -Additionally, you may submit to your choice of curators/influencers for extra credit - Live reporting from publications. In case no offers are received from publications, a free coupon will be provided.';
    const PREMIUM_DEC                         =   '45 days of featured coverage and exposure including 7 days on top banner display (premium feature) on upcomingsounds.com to: Top Dashboard section with a large thumbnail display with 90% to 100% more visibility *Influencers, media, and curators. If you choose media coverage and social media exposure. *Blogger, Podcast, Record label. if you choose Establish my Professorial Music Career. *Manager, publisher, record label, mentor, sync, sound expert. If you choose to Receive Detailed Advice. -Receive free placements from all curators as well as paid offers from influential curators/influencers. -Additionally, you may submit to your choice of curators/influencers for extra credit - Live reporting from publications. In case no offers are received from publications, a free coupon will be provided.';
 }

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
    const CONTRIBUTION_TEXT = "Whenever a contribution is requested from artists, a free alternative is now required. If artists are presented with your offer and your request for contributions, they can choose the free alternative instead of paying.It helps our artists get some free exposure if they can't afford the full offer. Free alternatives are designed for you to complete as quickly and easily as possible, and you'll know which variant of your offer the artist chooses from the offer pop-up.";
    const PROVIDE_A = "Provide a customised experience";

     const FREE_ALTERNATIVE_MESSAGE = "Please let us know why you chose this free alternative offer so that curators can gain insight into your decision";
    const DECLINE_MESSAGE_ONE = "Please let us know why you chose this decline this offer so that curators can gain insight into your decision";
    const DECLINE_MESSAGE = "Please share some more details with this curator below:";
    const CURATOR = "curator";
    const ARTIST = "artist";
    const DECLINE_1 = "The offer seems confusing to me";
     const DECLINE_2 = "The content presented does not interest me. I'm looking for something else";
     const DECLINE_3 = "The price of the offer is too high for me";
     const DECLINE_4 = "I've reached my budget limit on other offers";
     const DECLINE_5 = "Please describe any other reason";
    const OFFER_SUCCESS = "Offer Template Created Successfully";
    const OFFER_DIRECT_SUCCESS = "Offer Created Successfully and send to admin for approval. Admin will contact you soon. Admin will send to artist if approved.";
    const OFFER_UPDATED_SUCCESS = "Offer Template Updated Successfully. Please wait for approval from admin side.";
    const VIEW_SUBMISSION = "view_submission";
    const MAKE_ANOTHER_OFFER = "make_another_offer";
     const VERIFIED_COVERAGE_SUCCESS = "Verified Coverage Created Successfully";
     const VERIFIED_COVERAGE_UPDATED_SUCCESS = "Verified Coverage Updated Successfully. Please wait for approval from admin side.";
    const PROMOTE_ADD_TRACK = "Your music has been submitted to Upcomingsounds. Thank you

                                After that, what happens?

                                Our team is reviewing your release, and you will be notified by email once it has been accepted or declined. There is a possibility that this process could take up to 48 hours, but it is usually completed in much less time.

                                You will be able to proceed through our payment portal once your application is accepted, and your music will be accessible to content creators

                                The 45 days of exposure to our tastemakers begin as soon as payment has been completed.

                                Your application will be declined if it does not meet our criteria, but we will explain why so that you can re-apply based on the reason.";
 }

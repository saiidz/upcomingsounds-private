{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Terms of Service')

{{-- page content --}}
@section('content')

<style>
    /* Modern Terms & Legal Page Styles */
    :root {
        --primary-color: #4a90e2; /* Friendly Blue */
        --text-dark: #2d3748;
        --text-body: #4a5568;
        --bg-light: #f7fafc;
        --white: #ffffff;
        --radius: 12px;
    }

    body {
        background-color: var(--bg-light);
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    .terms-wrapper {
        padding: 60px 20px;
        min-height: 100vh;
    }

    .terms-card {
        background: var(--white);
        max-width: 900px;
        margin: 0 auto;
        padding: 60px 80px;
        border-radius: var(--radius);
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    /* Typography */
    .page-title {
        font-size: 36px;
        font-weight: 800;
        color: var(--text-dark);
        text-align: center;
        margin-bottom: 10px;
        letter-spacing: -0.5px;
    }

    .last-updated {
        text-align: center;
        color: #a0aec0;
        font-size: 14px;
        margin-bottom: 50px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--primary-color);
        margin-top: 40px;
        margin-bottom: 15px;
        border-bottom: 2px solid #edf2f7;
        padding-bottom: 10px;
    }

    p {
        font-size: 16px;
        line-height: 1.7;
        color: var(--text-body);
        margin-bottom: 20px;
        text-align: justify;
    }

    ul, ol {
        margin-bottom: 20px;
        padding-left: 20px;
        color: var(--text-body);
    }

    li {
        margin-bottom: 10px;
        line-height: 1.6;
    }

    a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    a:hover {
        color: #2b6cb0;
        text-decoration: underline;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .terms-card {
            padding: 30px 20px;
        }
        .page-title {
            font-size: 28px;
        }
    }
</style>

<div class="app-body">
    <div class="terms-wrapper">
        <div class="terms-card">
            
            <h1 class="page-title">Terms of Service</h1>
            <p class="last-updated">Effective Date: April 29, 2024</p>

            <p><strong>TERMS OF SERVICES OF WWW.UPCOMINGSOUNDS.COM</strong></p>

            <p>
                The purpose of these general conditions is to delineate the terms and conditions governing the use of the services provided on 
                <a href="https://upcomingsounds.com/">www.upcomingsounds.com</a> (hereinafter referred to as the "<strong>Services</strong>"), 
                as well as to outline the rights and obligations of the parties within this framework. Specifically, they are readily accessible 
                and printable at any time through a direct link located at the bottom of the homepage of the site 
                (hereinafter referred to as the "<strong>Site</strong>"). If necessary, they may be supplemented by specific terms of use 
                pertaining to certain Services. In the event of any contradiction, the special conditions take precedence over these general conditions.
            </p>

            <h2 class="section-title">1. Operator of the Site and Services</h2>
            <p>
                The Services are accessible through the Site. The Site and the Services are operated by <strong>Upcoming Sounds</strong>, 
                registered in England and Wales. Our registered office is at <strong>29-31 Parliament Street, Liverpool, England, L8 5RN</strong>
                (hereinafter: "<strong>Upcomingsounds</strong>").
            </p>
            <p>
                UpcomingSounds can be contacted at the following coordinates: <br>
                E-mail address: <a href="mailto:support@upcomingsounds.com">support@upcomingsounds.com</a>
            </p>
            <ol>
                <li>When you utilize our website ("Website") or our app, you are implicitly accepting these Terms of Use. If you disagree with these terms, you are prohibited from using our Website and/or App, and you should promptly discontinue such usage.</li>
                <li>These Terms of Use might mention other third-party entities; however, their sole purpose is to govern your usage of this Website, and they do not pertain to any of those other entities except as explicitly stated herein.</li>
                <li>The purpose of the Upcomingsounds.com service is to cater to the requirements of artists and their representatives, such as PR companies ("Artists"), who seek reviews and coverage of their creative endeavors ("Work/s" or "Work"). Additionally, it aims to facilitate writers, journalists, commentators, bloggers, YouTubers, podcasters, and/or tastemakers (collectively referred to as "Content Curators"), who wish to produce written pieces, blogs, podcasts, webcasts, or broadcasts about Artists and/or their Work/s, or to curate their Work/s ("Reviews").
                    <br><br>
                    Artists who desire Reviews can submit their Work/s or releases to this Website following the guidelines outlined on the website, which may specify formats, size limits, and other details. Work/s may encompass audio and/or audio-visual recordings, videos, compositions, lyrics, photos, existing reviews and quotes, social media content, and any other materials pertinent to the Artist and potentially intriguing to Content Curators and the broader audience.
                </li>
                <li>By uploading their Work/s to the Website, the Artist is granting Upcomingsounds and Content Curators facilitated by Upcomingsounds the non-exclusive right to utilize the Work/s for Review purposes. This includes the rights to utilize the Artist's name/s, image/s, and all materials embodied in the Work/s for Reviews or to obtain Reviews. Additionally, by uploading Work/s, the Artist is also granting Upcomingsounds the right to store and electronically transmit the Work/s to Content Curators for the purpose of obtaining Reviews.</li>
                <li>By uploading Work/s to the Website, the Artist assures that they possess complete rights and permissions to upload such Work/s (including all its components) and to grant the rights as outlined to Upcomingsounds and/or Content Curators herein. The Artist further warrants that the Work/s will not violate the rights of any third parties (including copyrights and/or trademarks) and hereby agrees to fully indemnify and hold harmless Upcomingsounds and/or Content Curators from any and all damages and liabilities.</li>
                <li>Upcomingsounds will exert reasonable efforts to obtain Reviews for uploaded Work/s. However, Upcomingsounds does not offer any warranty or assurance regarding its ability to secure Reviews for the Artist's uploaded Work/s.</li>
                <li>Upcomingsounds does not make any warranty as to the nature of any Review, coverage or any feature from any curator.</li>
                <li>Artists may request (via written communication) that Upcomingsounds should delete any of the Artist’s Work/s. Upcomingsounds will undertake such deletion within 30 days of such notice.</li>
                <li>Content Curators have the option to sign up as users on Upcomingsounds following the procedures communicated on the Website. Upcomingsounds reserves the right to refuse registration to any Content Curator at its discretion.</li>
                <li>After registration, Content Creators gain access to Upcomingsounds playlists showcasing Artists’ Work/s and have the opportunity to engage in the Upcomingsounds Paid Service. This involves making an offer to an Artist to Review their Work in exchange for a monetary contribution from the Artist towards the Content Curator’s time and expenses.</li>
                <li>If an Artist accepts an offer from a Content Curator, they will make the agreed contribution to Upcomingsounds using USC Credits. Upcomingsounds will then retain the payment until the Content Curator provides evidence that the Review/work has been completed.</li>
                <li>Upcomingsounds will inform the Content Curator upon the Artist's acceptance of an offer and payment to Upcomingsounds. However, Upcomingsounds holds no responsibility toward the Content Curator if the Artist fails to fulfill the agreed payment.</li>
            </ol>

            <h2 class="section-title">2. Site Operation and Definition</h2>
            <p><strong>2.1. Site Operation</strong><br>
            The Site enables artists (and their representatives) (hereinafter: the "Customers/Artists") to submit music to media, labels, and musical influencers (hereinafter: the "Content Curators /Influencers/ Media") to receive any content publication featuring Service "publications and reviews".</p>
            
            <p><strong>2.2. Definitions</strong></p>
            <ul>
                <li><strong>Customer:</strong> Refers to any individual or entity, whether legally recognized or not, utilizing the website to deliver music to "Content Curators".</li>
                <li><strong>Work/s:</strong> Represents either a portion or the entirety of a musical composition for which the Customer possesses the exploitation rights.</li>
                <li><strong>Links:</strong> Refers to a hyperlink directing to an external service hosting the Piece, enabling free and unrestricted listening (e.g., YouTube, SoundCloud, Bandcamp).</li>
                <li><strong>Campaigns:</strong> A Campaign is a promotional initiative provided by Upcomingsounds, aimed at spotlighting a designated duration for a work, release, or musical piece to be showcased on the Curators Dashboard.</li>
                <li><strong>USC:</strong> Abbreviation for Upcoming Sounds Coin. It represents the credits used for internal transactions on the Site.</li>
                <li><strong>Services:</strong> Refers to the entirety of services offered by UpcomingSounds on the Site.</li>
            </ul>

            <h2 class="section-title">3. SMS & Communication</h2>
            <ul>
                <li><strong>Message Frequency:</strong> You will receive a one-time SMS for phone verification. Standard message and data rates may apply, depending on your mobile plan.</li>
                <li><strong>Possible Fees:</strong> No fees are required for this service.</li>
                <li><strong>How to Opt-in:</strong> No subscription is necessary; the SMS is a one-time verification message.</li>
                <li><strong>Data Handling:</strong> Provide your phone number and click "next" on the following page: <a href="https://upcomingsounds.com/taste-maker-phone-number">Verification Page</a>, or reply stop.</li>
            </ul>

            <h2 class="section-title">4. Data Handling</h2>
            <ul>
                <li><strong>Personal Information We Collect:</strong> We collect only phone numbers for the purpose of user verification.</li>
                <li><strong>Why We Collect It:</strong> Phone numbers are used for geo-user verification.</li>
                <li><strong>How We Use It:</strong> We do not share or sell your data to anyone. Your phone number is solely used for verification purposes.</li>
                <li><strong>User Rights:</strong> You have the right to request the removal of your data from our systems.</li>
                <li><strong>Contact:</strong> To exercise your rights or for any privacy concerns, please contact us at <a href="mailto:privacy@upcomingsounds.com">privacy@upcomingsounds.com</a>.</li>
            </ul>

            <h2 class="section-title">5. Content Usage & Privacy Policy</h2>
            <p>Unless explicitly stated otherwise, you are not permitted to copy, print, distribute, or modify the content on our Website and/or our App.</p>
            <ul>
                <li>You acknowledge that we may utilize your personal information and data in accordance with our <a href="https://upcomingsounds.com/privacy-policy" target="_blank">Privacy Statement</a> and <a href="https://upcomingsounds.com/privacy-policy" target="_blank">Cookie Policy</a>.</li>
                <li>We retain the right to revoke your access to our Website and/or App if we determine that your usage is harmful to the Website, the App, and/or other users.</li>
                <li>You agree to refrain from using our Website in a manner that disrupts, interferes with, or restricts the use of the platform by other third-party users.</li>
                <li>It is your responsibility to ensure that you have adequate protection against computer viruses, worms, Trojan horses, or any other harmful elements.</li>
            </ul>

            <h2 class="section-title">6. Intellectual Property Rights</h2>
            <p>
                Unless explicitly stated otherwise, the content found on our Website and App is provided by Upcomingsounds. 
                Our Website and App, along with their contents, are safeguarded by copyright, trademark, and other applicable laws of England and Wales. 
                The Upcomingsounds name and logo are trademarks representing reputation and goodwill.
            </p>

            <h2 class="section-title">7. Liability Disclaimers</h2>
            <p>
                Our Website and/or App are provided on an "as is" basis. We explicitly disclaim all implied warranties, including but not limited to merchantability, fitness for a specific purpose, and non-infringement.
                Your use of our Website and/or App is at your own risk, and you accept full responsibility for any loss incurred.
            </p>

            <h2 class="section-title">8. Language & Enforcement</h2>
            <p>
                If these terms and conditions are translated into one or more languages, the English language shall prevail in case of contradiction.
                The present general terms and conditions came into force on <strong>29/04/2024</strong>.
            </p>

        </div>
    </div>
</div>

@include('welcome-panels.welcome-footer')
@endsection

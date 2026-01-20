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
            <p class="last-updated">Last Updated: January 2025</p>

            <p><strong>WELCOME TO UPCOMINGSOUNDS.COM</strong></p>

            <p>
                These Terms of Service ("Terms") constitute a legally binding agreement between you ("User", "you", or "your") and <strong>Upcoming Sounds</strong> ("Company", "we", "us", or "our"), a company registered in England and Wales with its registered office at <strong>29-31 Parliament Street, Liverpool, England, L8 5RN</strong>.
            </p>
            <p>
                By accessing or using our website located at <a href="https://upcomingsounds.com/">www.upcomingsounds.com</a> (the "Site") and our related mobile applications and services (collectively, the "Services"), you agree to be bound by these Terms. If you do not agree to these Terms, you may not access or use the Services.
            </p>

            <h2 class="section-title">1. Accounts and Registration</h2>
            <ol>
                <li><strong>Eligibility:</strong> You must be at least 18 years old to use our Services. By creating an account, you represent and warrant that you are capable of entering into a binding contract.</li>
                <li><strong>Account Security:</strong> You are responsible for maintaining the confidentiality of your login credentials. You agree to notify us immediately of any unauthorized use of your account. Upcoming Sounds is not liable for any loss or damage arising from your failure to protect your account.</li>
                <li><strong>Role Definition:</strong>
                    <ul>
                        <li><strong>"Artists":</strong> Users who upload content ("Work") for review, promotion, or feedback.</li>
                        <li><strong>"Curators":</strong> Writers, influencers, or media outlets who review or feature Artist content.</li>
                    </ul>
                </li>
            </ol>

            <h2 class="section-title">2. Services and Marketplace Rules</h2>
            <ol>
                <li><strong>The Platform:</strong> Upcoming Sounds acts as an intermediary platform connecting Artists with Curators. We facilitate the submission of music and the transaction of credits ("USC Credits").</li>
                <li><strong>Submissions:</strong> By uploading Work, Artists grant Upcoming Sounds and relevant Curators a non-exclusive, worldwide, royalty-free license to use, play, and display the Work for the purpose of providing the Services (e.g., writing a review or adding it to a playlist).</li>
                <li><strong>Payments:</strong> Artists may purchase USC Credits to submit Works to Curators. All payments are final and non-refundable unless expressly stated otherwise in our Refund Policy.</li>
                <li><strong>Curator Obligations:</strong> Curators agree to provide honest, professional feedback or coverage. Upcoming Sounds does not guarantee positive reviews or specific placement.</li>
                <li><strong>Disputes:</strong> While we may assist in resolving disputes between Artists and Curators, we are not a party to the direct transaction and hold no liability for the performance or quality of the Curator's services.</li>
            </ol>

            <h2 class="section-title">3. User Conduct</h2>
            <p>You agree not to engage in any of the following prohibited activities:</p>
            <ul>
                <li>Uploading content that is illegal, offensive, infringing, or harmful (including viruses or malware).</li>
                <li>Attempting to bypass the Site's payment system to transact directly with other users found on the Site ("Platform Circumvention").</li>
                <li>Using automated bots, scrapers, or spiders to access or extract data from the Site.</li>
                <li>Harassing, abusing, or harming another person or group.</li>
            </ul>

            <h2 class="section-title">4. Intellectual Property</h2>
            <ol>
                <li><strong>Your Content:</strong> You retain all ownership rights to the Work you upload. You warrant that you own or have the necessary licenses, rights, consents, and permissions to publish the Work you submit.</li>
                <li><strong>Our Content:</strong> The Site, including its text, graphics, logos, and code, is the property of Upcoming Sounds and is protected by copyright and trademark laws. You may not use our branding without prior written consent.</li>
                <li><strong>Copyright Claims:</strong> We respect intellectual property rights. If you believe content on our Site infringes your copyright, please contact us at <a href="mailto:support@upcomingsounds.com">support@upcomingsounds.com</a>.</li>
            </ol>

            <h2 class="section-title">5. SMS & Communications</h2>
            <p>
                By providing your phone number, you consent to receive a one-time SMS for identity verification purposes.
            </p>
            <ul>
                <li><strong>Fees:</strong> Upcoming Sounds does not charge for this SMS, but standard message and data rates from your carrier may apply.</li>
                <li><strong>Privacy:</strong> Your phone number is used strictly for verification and account security. We do not sell your personal contact information to third parties.</li>
            </ul>

            <h2 class="section-title">6. Disclaimers and Limitation of Liability</h2>
            <p>
                <strong>"AS IS" Service:</strong> The Services are provided on an "AS IS" and "AS AVAILABLE" basis without warranties of any kind, either express or implied, including but not limited to warranties of merchantability or fitness for a particular purpose.
            </p>
            <p>
                <strong>Limitation of Liability:</strong> To the fullest extent permitted by law, Upcoming Sounds shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses.
            </p>

            <h2 class="section-title">7. Termination</h2>
            <p>
                We reserve the right to suspend or terminate your account and access to the Services at our sole discretion, without notice, for conduct that we believe violates these Terms or is harmful to other users, us, or third parties, or for any other reason.
            </p>

            <h2 class="section-title">8. Governing Law</h2>
            <p>
                These Terms shall be governed by and construed in accordance with the laws of England and Wales. Any disputes arising under or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts of England and Wales.
            </p>

            <h2 class="section-title">9. Contact Us</h2>
            <p>
                If you have any questions about these Terms, please contact us at: <br>
                <strong>Email:</strong> <a href="mailto:support@upcomingsounds.com">support@upcomingsounds.com</a>
            </p>

        </div>
    </div>
</div>

@include('welcome-panels.welcome-footer')
@endsection

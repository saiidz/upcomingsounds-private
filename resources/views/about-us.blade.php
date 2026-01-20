{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','About Us')

{{-- page style --}}
@section('page-style')
<style>
    /* Modern About Us Styles */
    :root {
        --primary-color: #4a90e2; /* Friendly Blue */
        --text-dark: #2d3748;
        --text-body: #4a5568;
        --bg-light: #f7fafc;
        --white: #ffffff;
        --shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    body {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        background-color: var(--bg-light);
    }

    /* Hero Section */
    .about-hero {
        position: relative;
        height: 450px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: var(--white);
        margin-bottom: 60px;
    }

    /* Dark overlay for text readability */
    .about-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.7));
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 56px;
        font-weight: 800;
        margin-bottom: 20px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        letter-spacing: -1px;
    }

    .hero-subtitle {
        font-size: 22px;
        opacity: 0.95;
        font-weight: 500;
        line-height: 1.5;
        text-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    /* Main Container */
    .main-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px 100px;
    }

    /* Story Section */
    .story-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 60px;
        background: var(--white);
        padding: 60px;
        border-radius: 16px;
        box-shadow: var(--shadow);
    }

    .story-block h2 {
        font-size: 32px;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 25px;
        position: relative;
        display: inline-block;
    }

    .story-block h2::after {
        content: '';
        display: block;
        width: 100%;
        height: 4px;
        background: var(--primary-color);
        margin-top: 8px;
        border-radius: 2px;
        opacity: 0.3;
    }

    .story-block p {
        color: var(--text-body);
        line-height: 1.8;
        font-size: 18px;
        margin-bottom: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .about-hero { height: 350px; }
        .hero-title { font-size: 36px; }
        .hero-subtitle { font-size: 18px; }
        .story-grid { padding: 30px; }
        .story-block h2 { font-size: 26px; }
    }
</style>
@endsection

{{-- page content --}}
@section('content')
<div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">
    
    <div class="about-hero" style="background-image: url({{asset(!empty($theme->banner) ? $theme->banner : 'images/upcoming-aboutus.jpg')}})">
        <div class="hero-content">
            <h1 class="hero-title">{{ !empty($theme->heading) ? $theme->heading : 'About Us'}}</h1>
            <p class="hero-subtitle">{{ !empty($theme->description) ? $theme->description : 'Headquarters: 29-31 Parliament Street, Liverpool, England, L8 5RN'}}</p>
        </div>
    </div>

    <div class="main-wrapper">
        <div class="story-grid">
            
            <div class="story-block">
                <h2>{{ !empty($theme->heading_one) ? $theme->heading_one : 'How We Started'}}</h2>
                <p>
                    {{ !empty($theme->content_one) ? $theme->content_one : 'UpcomingSounds.com was launched in response to the demand for a fair but rewarding way to get noticed by those who are in search of talent. We created a space where new and known artists can share their work and find artist mentors to help them reach a higher level.'}}
                </p>
            </div>

            @if(!empty($theme->heading_two) || !empty($theme->content_two))
            <div class="story-block" style="margin-top: 40px; border-top: 1px solid #edf2f7; padding-top: 40px;">
                <h2>{{ !empty($theme->heading_two) ? $theme->heading_two : 'Our Mission'}}</h2>
                <p>
                    {{ !empty($theme->content_two) ? $theme->content_two : 'Our mission is to empower artists by providing a platform that connects them directly with the industry.'}}
                </p>
            </div>
            @endif

        </div>
    </div>
</div>

@include('welcome-panels.welcome-footer')
@endsection

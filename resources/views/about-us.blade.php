{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','About Us')

{{-- page style --}}
@section('page-style')
<style>
    /* Modern About Us Variables */
    :root {
        --primary-color: #4a90e2; /* Friendly Blue */
        --primary-hover: #357abd;
        --text-dark: #2d3748;
        --text-body: #4a5568;
        --bg-light: #f7fafc;
        --white: #ffffff;
        --radius: 12px;
        --shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    body {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        background-color: var(--bg-light);
    }

    /* Hero Section */
    .about-hero {
        position: relative;
        height: 400px;
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
        background: rgba(0, 0, 0, 0.5); 
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 50px;
        font-weight: 800;
        margin-bottom: 15px;
        color: #ffffff;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
        font-size: 18px;
        font-weight: 500;
        color: #f1f1f1;
        text-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    /* Main Container */
    .main-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 80px;
    }

    /* Story Section (Split Layout) */
    .story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        margin-bottom: 80px;
    }

    /* If on mobile, stack columns */
    @media (max-width: 768px) {
        .story-grid {
            grid-template-columns: 1fr;
        }
        .about-hero {
            height: 300px;
        }
    }

    .story-block h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 20px;
        position: relative;
    }

    .story-block h2::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background: var(--primary-color);
        margin-top: 10px;
        border-radius: 2px;
    }

    .story-block p {
        color: var(--text-body);
        line-height: 1.8;
        font-size: 16px;
        text-align: justify;
    }

    /* Features / Cards Section */
    .section-heading {
        text-align: center;
        font-size: 32px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 50px;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .feature-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    .card-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .card-body {
        padding: 30px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-text {
        color: var(--text-body);
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 25px;
        flex-grow: 1;
    }

    /* Buttons */
    .btn-action {
        display: block;
        width: 100%;
        padding: 12px;
        text-align: center;
        background-color: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        font-weight: 600;
        border-radius: 50px;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-action:hover {
        background-color: var(--primary-color);
        color: var(--white);
        text-decoration: none;
    }
</style>
@endsection

{{-- page content --}}
@section('content')
<div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">
    
    <div class="about-hero" style="background-image: url({{ asset($theme->banner ?? 'images/upcoming-aboutus.jpg') }})">
        <div class="hero-content">
            <h1 class="hero-title">{{ $theme->heading ?? 'About Us' }}</h1>
            <p class="hero-subtitle">{{ $theme->description ?? 'Headquarters 29-31 Parliament Street, Liverpool, England, L8 5RN' }}</p>
        </div>
    </div>

    <div class="main-wrapper">
        
        <div class="story-grid">
            <div class="story-block">
                <h2>{{ $theme->heading_one ?? 'How We Started' }}</h2>
                <p>{{ $theme->content_one ?? 'UpcomingSounds.com was launched in response to the demand for a fair but rewarding way to get noticed by those who are in search of talent. We created a space where new and known artists can share their work and find artist mentors to help them reach a higher level.' }}</p>
            </div>
            <div class="story-block">
                <h2>{{ $theme->heading_two ?? 'Our Philosophy' }}</h2>
                <p>{{ $theme->content_two ?? 'Our philosophy has always been to make music promotion simple and effective for artists of all genres. With an intuitive user interface and seamless experience, we can connect curators directly with the artist community. No middleman, no contracts, just pure curation.' }}</p>
            </div>
        </div>

        <h2 class="section-heading">{{ $theme->about_us_title ?? 'Our Services' }}</h2>

        <div class="cards-grid">
            
            <div class="feature-card">
                <img src="{{ asset($theme->banner_one ?? 'images/Banner_UCSWEB1.jpg') }}" class="card-img" alt="Overview">
                <div class="card-body">
                    <p class="card-text">
                        {{ $theme->description_one ?? 'UpcomingSounds.com is a unique place where musicians can gain attention, promotion and greater prospects in the world of entertainment. It does not matter if you are just starting or if your work is already established, we are here to help.' }}
                    </p>
                    <a href="{{ url($theme->btn_link_one ?? '/artist-home') }}" class="btn-action">
                        {{ $theme->btn_text_one ?? 'Find out more' }}
                    </a>
                </div>
            </div>

            <div class="feature-card">
                <img src="{{ asset($theme->banner_two ?? 'images/Banner_UCSWEB2.jpg') }}" class="card-img" alt="For Artists">
                <div class="card-body">
                    <p class="card-text">
                        {{ $theme->description_two ?? 'Whether you are a composer, band member, producer or sound designer, Upcoming Sounds is the platform you have been waiting for. The site provides promotional opportunities to artists worldwide that might not have been otherwise available to them.' }}
                    </p>
                    <a href="{{ url($theme->btn_link_two ?? '/register') }}" class="btn-action">
                        {{ $theme->btn_text_two ?? 'Sign Up' }}
                    </a>
                </div>
            </div>

            <div class="feature-card">
                <img src="{{ asset($theme->banner_three ?? 'images/Banner_UCSWEB3.jpg') }}" class="card-img" alt="For Curators">
                <div class="card-body">
                    <p class="card-text">
                        {{ $theme->description_three ?? 'Most curators do this as a hobby, but verified users with an orange tick provide professional feedback and impactful results. It has never been easier to share your music with the world.' }}
                    </p>
                    <a href="{{ url($theme->btn_link_three ?? '/taste-maker-register') }}" class="btn-action">
                        {{ $theme->btn_text_three ?? 'Apply as tastemaker' }}
                    </a>
                </div>
            </div>

        </div> </div> </div>

@include('welcome-panels.welcome-footer')
@endsection


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
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6));
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 15px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .hero-subtitle {
        font-size: 20px;
        opacity: 0.9;
        font-weight: 500;
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

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .about-hero { height: 300px; }
        .hero-title { font-size: 32px; }
        .story-grid { grid-template-columns: 1fr; gap: 30px; }
    }
</style>
@endsection

{{-- page content --}}
@section('content')
<div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">
    
    <div class="about-hero" style="background-image: url({{asset(!empty($theme->banner) ? $theme->banner : 'images/upcoming-aboutus.jpg')}})">
        <div class="hero-content">
            <h1 class="hero-title">{{ !empty($theme->heading) ? $theme->heading : 'About Us'}}</h1>
            <p class="hero-subtitle">{{ !empty($theme->description) ? $theme->description : 'Headquarters 29-31 Parliament Street, Liverpool, England, L8 5RN'}}</p>
        </div>
    </div>

    <div class="main-wrapper">
        
        <div class="story-grid">
            <div class="story-block">
                <h2>{{ !empty($theme->heading_one) ? $theme->heading_one : 'How We Started'}}</h2>
                <p>{{ !empty($theme->content_one

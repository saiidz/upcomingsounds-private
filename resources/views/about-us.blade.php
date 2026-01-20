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

    /* Dark overlay to make text readable over any background */
    .about-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.6); /* Darker overlay for better contrast */
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 0 20px;
    }

    .hero-title {
        font-size: 52px;
        font-weight: 800;
        margin-bottom: 15px;
        color: #ffffff !important; /* Forces white text */
        text-shadow: 0 4px 10px rgba(0,0,0,0.5); /* Strong shadow for readability */
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .hero-subtitle {
        font-size: 2

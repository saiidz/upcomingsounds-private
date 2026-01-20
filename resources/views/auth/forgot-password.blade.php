{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Forgot Password')

@section('page-style')
<style>
    /* Modern UI/UX Variables - MATCHING LOGIN PAGE */
    :root {
        --primary-color: #4a90e2; /* Friendly Blue */
        --primary-hover: #357abd;
        --text-dark: #333333;
        --text-muted: #6c757d;
        --border-radius: 12px;
        --input-bg: #f8f9fa;
    }

    body {
        background-color: #f0f2f5;
    }

    /* Centered Card Container */
    .auth-wrapper {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .auth-card {
        background: #ffffff;
        width: 100%;
        max-width: 420px;
        padding: 40px;
        border-radius: var(--border-radius);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        text-align: center;
    }

    /* Typography */
    .auth-title {
        font-size: 26px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 10px;
    }

    .auth-subtitle {
        color: var(--text-muted);
        font-size: 15px;
        line-height: 1.5;
        margin-bottom: 30px;
    }

    /* Modern Input Fields */
    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        font-size: 15px;
        border: 1px solid #e1e1e1;
        border-radius: 8px;

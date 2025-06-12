@extends('core::layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <livewire:auth::forgot-password.send-link />
@endsection

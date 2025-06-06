@extends('core::layouts.auth')

@section('title', 'Email Verification')

@section('content')
    <livewire:auth::verification.email-verification id="{{ $id }}" />
@endsection

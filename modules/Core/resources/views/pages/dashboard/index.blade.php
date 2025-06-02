@php
    $urls = [
        [
            'link' => '',
            'name' => 'Dashboard',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="relative">
        <livewire:core::components.breadcrumb pageName="Dashboard" :urls="$urls" />
        <livewire:core::dashboard.page />
    </div>
@endsection

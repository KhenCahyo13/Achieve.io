@php
    $urls = [
        [
            'link' => '',
            'name' => 'User',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'User')
@section('content')
    <div x-data="{
        isShowNotification: false,
        notificationMessage: '',
    }" class="relative">
        <livewire:core::components.breadcrumb pageName="User" :urls="$urls" />
        <livewire:master::user.table />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

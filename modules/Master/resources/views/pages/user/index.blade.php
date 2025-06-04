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
        isCreateModalOpen: false,
        notificationMessage: '',
    }" class="relative"
        x-on:user-created.window="isShowNotification = true; isCreateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="User" :urls="$urls" />
        <livewire:master::user.create />
        <livewire:master::user.table />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

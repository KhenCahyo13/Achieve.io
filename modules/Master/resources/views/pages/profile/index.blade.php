@php
    $urls = [
        [
            'link' => '',
            'name' => 'Profile',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Profile')
@section('content')
    <div x-data="{
        isUpdatePersonalInformationModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }" class="relative"
        x-on:profile-show-update-personal-information-modal.window="isUpdatePersonalInformationModalOpen = true;"
        x-on:profile-updated.window="isShowNotification = true; isUpdatePersonalInformationModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:profile-picture-updated.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
    >
        <livewire:core::components.breadcrumb pageName="Profile" :urls="$urls" />
        <livewire:core::components.notification type="success" />
        {{-- Update Form --}}
        <livewire:master::profile.update />
        <livewire:master::profile.details />
    </div>
@endsection

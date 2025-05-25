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
        isCreateModalOpen: false,
        isUpdateModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }" class="relative"
        x-on:period-deleted.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:period-created.window="isShowNotification = true; isCreateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:period-updated.window="isShowNotification = true; isUpdateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:period-show-update-modal.window="isUpdateModalOpen = true;">
        <livewire:core::components.breadcrumb pageName="Profile" :urls="$urls" />
        <livewire:master::profile.details />
    </div>
@endsection

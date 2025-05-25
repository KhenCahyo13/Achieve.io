@php
    $urls = [
        [
            'link' => '',
            'name' => 'Achievement',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Achievement')
@section('content')
    <div class="relative" x-data="{
        isCreateModalOpen: false,
        isUpdateModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }"
        x-on:achievement-created.window="isCreateModalOpen = false; isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Competition" :urls="$urls" />
        <livewire:core::components.notification type="success" />
        {{-- Create Modal --}}
        <livewire:achievement::achievement.create />
        <div class="card">
            <livewire:achievement::achievement.table />
        </div>
    </div>
@endsection

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
        isDetailsModalOpen: false,
        isUpdateModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }"
        x-on:achievement-created.window="isCreateModalOpen = false; isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:achievement-show-details-modal.window="isDetailsModalOpen = true;">
        <livewire:core::components.breadcrumb pageName="Achievement" :urls="$urls" />
        <livewire:core::components.notification type="success" />
        {{-- Create Modal --}}
        <livewire:achievement::achievement.create />
        {{-- Details Modal --}}
        <livewire:achievement::achievement.details />
        <div class="card">
            <livewire:achievement::achievement.table />
        </div>
    </div>
@endsection

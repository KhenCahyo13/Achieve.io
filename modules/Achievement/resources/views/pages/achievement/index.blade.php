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
        isDetailsModalOpen: false,
        isExportPdfModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }"
        x-on:achievement-created.window="isCreateModalOpen = false; isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:achievement-updated.window="isUpdateModalOpen = false; isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:achievement-deleted.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:achievement-show-details-modal.window="isDetailsModalOpen = true;"
        x-on:achievement-show-update-modal.window="isUpdateModalOpen = true;"
        x-on:achievement-approval.window="isDetailsModalOpen = false; isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Achievement" :urls="$urls" />
        <livewire:core::components.notification type="success" />
        {{-- Update Modal --}}
        <livewire:achievement::achievement.update />
        {{-- Create Modal --}}
        <livewire:achievement::achievement.create />
        {{-- Details Modal --}}
        <livewire:achievement::achievement.details />
        {{-- Export PDF Modal --}}
        <livewire:achievement::achievement.export-pdf />
        <div class="card">
            <livewire:achievement::achievement.table />
        </div>
    </div>
@endsection

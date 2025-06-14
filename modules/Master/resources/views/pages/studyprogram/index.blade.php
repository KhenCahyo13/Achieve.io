@php
    $urls = [
        [
            'link' => '',
            'name' => 'Study Program',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Study Program')
@section('content')
    <div x-data="{
        isCreateModalOpen: false,
        isUpdateModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }" class="relative"
        x-on:studyprogram-deleted.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:studyprogram-created.window="isShowNotification = true; isCreateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:studyprogram-updated.window="isShowNotification = true; isUpdateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:studyprogram-show-update-modal.window="isUpdateModalOpen = true;">
        <livewire:core::components.breadcrumb pageName="Study Program" :urls="$urls" />
        <livewire:master::study-program.table />
        <livewire:master::study-program.create />
        <livewire:master::study-program.update />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

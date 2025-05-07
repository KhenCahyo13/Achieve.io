@php
    $urls = [
        [
            'link' => 'achievement.competition.index',
            'name' => 'Competition',
        ],
        [
            'link' => '',
            'name' => 'Create',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Competition')
@section('content')
    <div class="relative" x-data="{
        isShowNotification: false,
        notificationMessage: '',
    }"
        x-on:competition-created.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Create" :urls="$urls" />
        <livewire:achievement::competition.create />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

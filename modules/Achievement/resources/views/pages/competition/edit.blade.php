@php
    $urls = [
        [
            'link' => 'achievement.competition.index',
            'name' => 'Competition',
        ],
        [
            'link' => '',
            'name' => 'Update',
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
        x-on:competition-updated.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Update" :urls="$urls" />
        <livewire:achievement::competition.update id="{{ $id }}" />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

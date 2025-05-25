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
    }">
        <livewire:core::components.breadcrumb pageName="Competition" :urls="$urls" />
        <livewire:core::components.notification type="success" />
        {{-- Create Modal --}}
        <livewire:achievement::achievement.create />
        <div class="card">
            <livewire:achievement::achievement.table />
        </div>
    </div>
@endsection

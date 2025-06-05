@php
    $urls = [
        [
            'link' => '',
            'name' => 'Role & Permissions',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Role & Permissions')
@section('content')
    <div x-data="{
        isShowNotification: false,
        notificationMessage: '',
    }" class="relative"
        x-on:rolepermissions-deleted.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Role & Permissions" :urls="$urls" />
        <livewire:master::role-permissions.table />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

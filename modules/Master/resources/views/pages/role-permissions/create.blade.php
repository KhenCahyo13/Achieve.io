@php
    $urls = [
        [
            'link' => 'master.role-permissions.index',
            'name' => 'Role & Permissions',
        ],
        [
            'link' => '',
            'name' => 'Create',
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
        x-on:rolepermissions-created.window="isShowNotification = true; isCreateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Create" :urls="$urls" />
        <livewire:master::role-permissions.create />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

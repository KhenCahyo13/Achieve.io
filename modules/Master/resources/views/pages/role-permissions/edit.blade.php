@php
    $urls = [
        [
            'link' => 'master.role-permissions.index',
            'name' => 'Role & Permissions',
        ],
        [
            'link' => '',
            'name' => 'Update',
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
        x-on:rolepermissions-updated.window="isShowNotification = true; isUpdateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Update" :urls="$urls" />
        <livewire:master::role-permissions.update id="{{ $id }}" />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

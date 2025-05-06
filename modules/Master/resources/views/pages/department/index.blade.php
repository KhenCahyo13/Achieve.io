@extends('core::layouts.app')

@section('title', 'Department')
@section('content')
    <div x-data="{
        isCreateModalOpen: false,
        isUpdateModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }" class="relative"
        x-on:department-deleted.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:department-created.window="isShowNotification = true; isCreateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:department-updated.window="isShowNotification = true; isUpdateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:department-show-update-modal.window="isUpdateModalOpen = true;">
        <livewire:core::components.breadcrumb pageName="Department" />
        <livewire:master::department.table />
        <livewire:master::department.create />
        <livewire:master::department.update />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

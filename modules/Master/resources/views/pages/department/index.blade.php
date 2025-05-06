@extends('core::layouts.app')

@section('title', 'Department')
@section('content')
    <div x-data="{
        isCreateModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }" class="relative"
        x-on:department-deleted.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:department-created.window="isShowNotification = true; isCreateModalOpen = false; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Jurusan" />
        <livewire:master::department.table />
        <livewire:master::department.create />
        <livewire:core::components.notification type="success" />
    </div>
@endsection

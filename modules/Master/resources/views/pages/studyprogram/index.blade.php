@extends('core::layouts.app')

@section('title', 'Program Studi')
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
        <livewire:master::study-program.table />
    </div>
@endsection

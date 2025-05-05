@extends('core::layouts.app')

@section('title', 'Department')
@section('content')
    <livewire:core::components.breadcrumb pageName="Jurusan" />
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="px-5 py-4 sm:px-6 sm:py-5">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                Data Jurusan
            </h3>
        </div>
        <livewire:master::department.table />
    </div>
@endsection

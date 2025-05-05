@extends('core::layouts.app')

@section('title', 'Department')
@section('content')
    <div x-data="{
        isCreateModalOpen: false,
    }">
        <livewire:core::components.breadcrumb pageName="Jurusan" />
        <livewire:master::department.table />
        <livewire:master::department.create />
    </div>
@endsection

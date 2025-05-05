@extends('core::layouts.app')

@section('title', 'Department')
@section('content')
    <livewire:core::components.breadcrumb pageName="Jurusan" />
    <livewire:master::department.table />
@endsection

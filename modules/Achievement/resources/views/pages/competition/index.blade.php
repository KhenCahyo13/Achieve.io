@php
    $urls = [
        [
            'link' => '',
            'name' => 'Competition',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Competition')
@section('content')
    <livewire:core::components.breadcrumb pageName="Competition" :urls="$urls" />
@endsection
@php
    $urls = [
        [
            'link' => 'achievement.competition.index',
            'name' => 'Competition',
        ],
        [
            'link' => '',
            'name' => 'Create',
        ],
    ];
@endphp

@extends('core::layouts.app')

@section('title', 'Competition')
@section('content')
    <livewire:core::components.breadcrumb pageName="Create" :urls="$urls" />
    <livewire:achievement::competition.create />
@endsection

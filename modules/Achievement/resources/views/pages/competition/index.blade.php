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
    <div class="relative" x-data="{
        isDetailsModalOpen: false,
        isGetRecommendationModalOpen: false,
        isRegisterModalOpen: false,
        isShowNotification: false,
        notificationMessage: '',
    }" x-on:competition-show-details-modal.window="isDetailsModalOpen = true;"
        x-on:competition-show-register-modal.window="isDetailsModalOpen = false; isRegisterModalOpen = true;"
        x-on:competition-deleted.window="isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:competition-approval.window="isDetailsModalOpen = false; isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);"
        x-on:competition-participant-created.window="isDetailsModalOpen = false; isRegisterModalOpen = false; isShowNotification = true; notificationMessage = $event.detail.message; setTimeout(() => isShowNotification = false, 3000);">
        <livewire:core::components.breadcrumb pageName="Competition" :urls="$urls" />
        <livewire:core::components.notification type="success" />
        {{-- Get Recommendation --}}
        <livewire:achievement::competition.recommendation-competition />
        {{-- Register Competition --}}
        <livewire:achievement::competition.register />
        {{-- Competition Details --}}
        <livewire:achievement::competition.details />
        {{-- Page Content by Tab --}}
        <div class="flex flex-col gap-y-4">
            <livewire:achievement::competition.components.data-overview />

            <div class="card" x-data="{
                activeTab: 'all'
            }">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <nav
                        class="flex overflow-x-auto rounded-lg bg-gray-100 p-1 dark:bg-gray-900 [&amp;::-webkit-scrollbar-thumb]:rounded-full [&amp;::-webkit-scrollbar-thumb]:bg-gray-200 dark:[&amp;::-webkit-scrollbar-thumb]:bg-gray-600 [&amp;::-webkit-scrollbar-track]:bg-white dark:[&amp;::-webkit-scrollbar-track]:bg-transparent [&amp;::-webkit-scrollbar]:h-1.5">
                        <button
                            class="inline-flex items-center gap-x-2 rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200 ease-in-out bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                            x-bind:class="activeTab === 'all' ?
                                'bg-white text-gray-900 shadow-theme-xs dark:bg-white/[0.03] dark:text-white' :
                                'bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200'"
                            x-on:click="activeTab = 'all'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                            </svg>
                            All Competition
                        </button>
                        <button
                            class="inline-flex items-center gap-x-2 rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200 ease-in-out bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                            x-bind:class="activeTab === 'available' ?
                                'bg-white text-gray-900 shadow-theme-xs dark:bg-white/[0.03] dark:text-white' :
                                'bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200'"
                            x-on:click="activeTab = 'available'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                            Available Competition <span
                                class="w-6 h-6 flex items-center justify-center text-sm rounded-full bg-brand-400 text-white">{{ $countAvailableCompetitions }}</span>
                        </button>
                        @can('register competition')
                            <button
                                class="inline-flex items-center gap-x-2 rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200 ease-in-out bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                                x-bind:class="activeTab === 'followed' ?
                                    'bg-white text-gray-900 shadow-theme-xs dark:bg-white/[0.03] dark:text-white' :
                                    'bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200'"
                                x-on:click="activeTab = 'followed'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                </svg>
                                Followed Competition <span
                                    class="w-6 h-6 flex items-center justify-center text-sm rounded-full bg-brand-400 text-white">{{ $countFollowedCompetitions }}</span>
                            </button>
                        @endcan
                    </nav>
                </div>
                <div x-show="activeTab === 'all'">
                    <livewire:achievement::competition.table />
                </div>
                <div x-show="activeTab === 'available'">
                    <livewire:achievement::competition.available />
                </div>
                <div x-show="activeTab === 'followed'">
                    <livewire:achievement::competition.followed />
                </div>
            </div>
        </div>
    </div>
@endsection

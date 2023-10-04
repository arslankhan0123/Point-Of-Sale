@extends('admin.layout.layout')
@section('content')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="py-6" style="position: relative; top: 136px;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 row justify-content-around">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg col-md-5">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg col-md-5">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg col-md-5 mt-3">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg col-md-5 invisible">
        </div>
    </div>
</div>


@endsection

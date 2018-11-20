@extends('layouts.app')

@section('content')
    <columbogram-component send={{ __('Send') }}
        write-message="{{ __('Write a message') }}"
        send-btn={{ asset('img/logo24x24.png') }}
        disable-notifications="{{ __('Disable notifications') }}"
        search="{{ __('Search') }}"
        :user-id="{{ auth()->id() }}"
        :user="{{ auth()->user() }}"
        csrf-token="{{ csrf_token() }}"
        email="{{ __('E-Mail Address') }}"
        enter-email="{{ __('Enter email') }}"
        name="{{ __('Name') }}"
        enter-name="{{ __('Enter name') }}"
        password="{{ __('Password') }}"
        enter-password="{{ __('Enter password') }}"
        profile="{{ __('Profile') }}"
        upload-file="{{ __('Upload file') }}">
    </columbogram-component>
@endsection
@extends('layouts.app')

@section('content')
    <columbogram-component send={{ __('Send') }}
        write-message="{{ __('Write a message') }}"
        send-btn={{ asset('img/logo24x24.png') }}
        disable-notifications="{{ __('Disable notifications') }}"
        search="{{ __('Search') }}"
        :user-id="{{ auth()->id() }}">
    </columbogram-component>
@endsection
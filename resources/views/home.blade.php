@extends('layouts.app')

@section('content')
<b-container fluid class="h-100">
    <b-row class="h-100">
        <b-col cols="4" class="pt-3">
            <contact-list-component search="{{ __('Search') }}"></contact-list-component>
        </b-col>

        <b-col cols="8">
            <active-conversation-component class="h-100"
                send={{ __('Send') }}
                write-message="{{ __('Write a message') }}"
                send-btn={{ asset('img/logo24x24.png') }}
                disable-notifications="{{ __('Disable notifications') }}">
            </active-conversation-component>
        </b-col>
    </b-row>
</b-container>
@endsection
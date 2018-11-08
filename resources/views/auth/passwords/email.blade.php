@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-center my-3">
        <b-col cols="12" md="8" lg="6">
            <div>
                <b-img center src="{{ asset('img/logo32x32.png') }}" alt="Columbogram logo" />
            </div>
            <h2 class="text-center">{{ __('Reset Password') }}</h2>
            <b-form method="POST" action="{{ route('password.email') }}">
                @csrf

                <b-card>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b-form-group label="{{ __('E-Mail Address') }}">
                        <b-form-input type="email"
                            id="email" name="email"
                            value="{{ old('email') }}"
                            required autofocus
                            placeholder="{{ __('Enter email') }}">
                        </b-form-input>

                        @if ($errors->has('email'))
                            <small class="text-danger mb-0">{{ $errors->first('email') }}</small>
                        @endif
                    </b-form-group>
                </b-card>

                <b-form-group class="text-center mt-3">
                    <b-button type="submit"
                        size="sm" variant="dark">
                        {{ __('Send Password Reset Link') }}
                    </b-button>
                </b-form-group>
            </b-form>
        </b-col>
    </b-row>
</b-container>
@endsection

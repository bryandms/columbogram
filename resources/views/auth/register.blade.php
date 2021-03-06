@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-center pt-3">
        <b-col cols="12" md="8" lg="6">
            <div>
                <b-img center src="{{ asset('img/logo32x32.png') }}" alt="Columbogram logo" />
            </div>
            <h2 class="text-center">{{ __('Register') }}</h2>
            <b-form method="POST" action="{{ route('register') }}">
                @csrf

                <b-card>
                    <b-form-group label="{{ __('Name') }}">
                        <b-form-input type="text"
                            id="name" name="name"
                            value="{{ old('name') }}"
                            required autofocus
                            placeholder="{{ __('Enter name') }}">
                        </b-form-input>

                        @if ($errors->has('name'))
                            <small class="text-danger mb-0">{{ $errors->first('name') }}</small>
                        @endif
                    </b-form-group>

                    <b-form-group label="{{ __('E-Mail Address') }}">
                        <b-form-input type="email"
                            id="email" name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="{{ __('Enter email') }}">
                        </b-form-input>

                        @if ($errors->has('email'))
                            <small class="text-danger mb-0">{{ $errors->first('email') }}</small>
                        @endif
                    </b-form-group>

                    <b-form-group label="{{ __('Password') }}">
                        <b-form-input type="password"
                            id="password" name="password"
                            required
                            placeholder="{{ __('Enter password') }}">
                        </b-form-input>

                        @if ($errors->has('password'))
                            <small class="text-danger mb-0">{{ $errors->first('password') }}</small>
                        @endif
                    </b-form-group>

                    <b-form-group label="{{ __('Confirm Password') }}">
                        <b-form-input type="password"
                            id="password_confirmation" name="password_confirmation"
                            required
                            placeholder="{{ __('Confirm Password') }}">
                        </b-form-input>

                        @if ($errors->has('password_confirmation'))
                            <small class="text-danger mb-0">{{ $errors->first('password_confirmation') }}</small>
                        @endif
                    </b-form-group>
                </b-card>

                <b-form-group class="text-center mt-3">
                    <b-button type="submit"
                        size="sm" variant="dark">
                        {{ __('Register') }}
                    </b-button>
                </b-form-group>
            </b-form>
        </b-col>
    </b-row>
</b-container>
@endsection

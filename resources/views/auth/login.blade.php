@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-center pt-3">
        <b-col cols="12" md="8" lg="6">
            <div>
                <b-img center src="{{ asset('img/logo32x32.png') }}" alt="Columbogram logo" />
            </div>
            <h2 class="text-center">{{ __('Login') }}</h2>
            <b-form method="POST" action="{{ route('login') }}">
                @csrf

                <b-card>
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

                    <b-form-group class="text-center mb-0 d-md-inline-flex">
                        <b-form-checkbox id="remember" name="remember"
                            {{ old('remember') ? 'checked="true"' : '' }}>
                            {{ __('Remember Me') }}
                        </b-form-checkbox>

                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </b-form-group>
                </b-card>

                <b-form-group class="text-center mt-3">
                    <b-button type="submit"
                        size="sm" variant="dark">
                        {{ __('Login') }}
                    </b-button>
                </b-form-group>
            </b-form>
        </b-col>
    </b-row>
</b-container>
@endsection

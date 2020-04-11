@extends('layouts.admin_login')
@section('content')
<form role="form" method="POST" action="{{ route('login') }}">
    @csrf
    <fieldset>
        <div class="form-group">
            <input class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" type="password" value="">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="checkbox">
            <label>
                <input name="remember" type="checkbox" value="Remember Me" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}
            </label>
        </div>
        <!-- Change this to a button or input when using this as a form -->
        <button class="btn btn-lg btn-success btn-block" type="submit">{{ __('Login') }}</button>
    </fieldset>
</form>
@endsection
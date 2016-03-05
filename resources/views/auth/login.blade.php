@extends("base")

@section("content")
    @unless (Auth::guest())
        <p>
            You are already signed in. You must sign out before you can log in again.
        </p>
        <a href="{{ URL::previous() }}">
            <button type="button" class="btn btn-default">Back</button>
        </a>
    @else
        <form method="POST">
            {!! csrf_field() !!}

            @if ($errors->has('email'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <label for="email">Email:</label>
            <input class="form-control sign-in-form-input" type="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('password'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('password') }}
                </div>
            @endif
            <label for="password">Password:</label>
            <input class="form-control sign-in-form-input" type="password" name="password">

            <label for="checkbox">Remember me:</label>
            @if (old('remember'))
                <input class="login-remember-me-checkbox" type="checkbox" name="remember" checked>
            @else
                <input class="login-remember-me-checkbox" type="checkbox" name="remember">
            @endif

            <button type="submit" class="btn btn-default sign-in-button">
                Sign In
            </button>
    </form>
    @endunless
@endsection

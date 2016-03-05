@extends("base")

@section("content")
    @unless (Auth::guest())
        <p>
            You are already signed in. You must sign out before you can create a new account.
        </p>
        <a href="{{ URL::previous() }}">
            <button type="button" class="btn btn-default">Back</button>
        </a>
    @else
        <form method="POST">
            {!! csrf_field() !!}

            @if ($errors->has('name'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('name') }}
                </div>
            @endif
            <label for="name">Name:</label>
            <input class="form-control register-form-input" type="text" name="name" value="{{ old('name') }}">

            @if ($errors->has('email'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <label for="email">Email:</label>
            <input class="form-control register-form-input" type="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('password'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('password') }}
                </div>
            @endif
            <label for="password">Password:</label>
            <input class="form-control register-form-input" type="password" name="password">

            @if ($errors->has('password_confirmation'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
            <label for="password_confirmation">Confirm password:</label>
            <input class="form-control register-form-input" type="password" class="form-control" name="password_confirmation">

            <button type="submit" class="btn btn-default register-button">
                Register
            </button>
        </form>
    @endunless
@endsection

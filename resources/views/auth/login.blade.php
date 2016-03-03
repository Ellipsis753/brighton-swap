@extends("base")

@section("content")

<!-- TODO: Add a message to users that are already logged in -->

    <form class="form-horizontal" role="form" method="POST" action="{{ url('signin') }}">
        {!! csrf_field() !!}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            Email:
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            password:
            <input type="password" class="form-control" name="password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <input type="checkbox" name="remember">
        <button type="submit" class="btn btn-primary">Login</button>
    
        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </form>
@endsection

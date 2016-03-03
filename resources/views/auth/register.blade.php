@extends("base")

@section("content")

<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {!! csrf_field() !!}
    name:
    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif

    email:
    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    password:
   <input type="password" class="form-control" name="password">
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif

    confirm password:
    <input type="password" class="form-control" name="password_confirmation">
    @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    @endif
  
    <button type="submit" class="btn btn-primary">
        Register
    </button>
</form>
@endsection

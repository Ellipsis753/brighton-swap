@extends("base")

@section("content")
    @if (Auth::guest())
        <p>
            You must sign in to create a trade.
        </p>
        <a href="{{ URL::previous() }}">
            <button type="button" class="btn btn-default">Back</button>
        </a>
    @else
        <form method="POST">
            {{ csrf_field() }}

            @if ($errors->has('have'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('have') }}
                </div>
            @endif
            <label for="have">What item are you hoping to trade?</label>
            <input class="form-control basic-form-input" type="text" name="have">

            @if ($errors->has('want'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('want') }}
                </div>
            @endif
            <label for="want">What are you looking for in exchange?</label>
            <input class="form-control basic-form-input" type="text" name="want">

            @if ($errors->has('details'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('details') }}
                </div>
            @endif
            <label for="details">Details (Don't forget to include contact details):</label>
            <input class="form-control basic-form-input" type="text" name="details">

            <button type="submit" class="btn btn-default">Create</button>
        </form>
    @endif
@endsection

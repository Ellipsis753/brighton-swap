@extends("base")

@section("content")
    @cannot("update", $post)
        <p>
            You do not have the needed permissions to edit this post. Make sure that you are logged in with the correct account.
        </p>
        <a href="{{ URL::previous() }}">
            <button type="button" class="btn btn-default">Back</button>
        </a>
    @else
        <form method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @if ($errors->has('have'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('have') }}
                </div>
            @endif
            <label for="have">What item are you hoping to trade?</label>
            <input class="form-control basic-form-input" type="text" name="have" value="{{ $post->have }}">

            @if ($errors->has('want'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('want') }}
                </div>
            @endif
            <label for="want">What are you looking for in exchange?</label>
            <input class="form-control basic-form-input" type="text" name="want" value="{{ $post->want }}">

            @if ($errors->has('details'))
                <div class="alert alert-danger alert-danger--reduced-margin">
                    {{ $errors->first('details') }}
                </div>
            @endif
            <label for="details">Details (Don't forget to include contact details):</label>
            <input class="form-control basic-form-input" type="text" name="details" value="{{ $post->details }}">

            <button type="submit" class="btn btn-default">Save</button>
        </form>
    @endcannot
@endsection

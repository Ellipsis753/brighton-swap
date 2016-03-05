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

            What item are you hoping to trade?
            <input type="text" name="have" value="{{ $post->have }}"><br />

            What are you looking for in exchange?
            <input type="text" name="want" value="{{ $post->want }}"><br />

            Details:
            <input type="text" name="details" value="{{ $post->details }}"><br />

            <button type="submit">save</button>
        </form>
    @endcannot
@endsection

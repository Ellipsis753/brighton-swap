@extends("base")

@section("content")

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

@endsection

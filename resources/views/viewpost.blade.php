@extends("base")

@section("content")

    have:
    {{ $post->have }}<br />

    want:
    {{ $post->want }}<br />

    Details:
    {{ $post->details }}<br />

@endsection

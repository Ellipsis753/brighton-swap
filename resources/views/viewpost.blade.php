@extends("base")

@section("content")
    <h1>Details of Trade</h1>

    <em>{{ ucfirst($post->user->name) }}</em> is looking to trade:
    <div class="well">
        {{ $post->have }}
    </div>

    <em>{{ ucfirst($post->user->name) }}</em> would like to get:
    <div class="well">
        {{ $post->want }}
    </div>

    Further details:
    <div class="well">
        {{ $post->details }}
    </div>

@endsection

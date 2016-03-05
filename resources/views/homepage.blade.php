@extends("base")

@section("content")
    <!-- Include the JavaScript just for this page. -->
    <script src="/javascript/homepage.js" async></script>
    <p>
        Welcome to the website. The idea is that you can offer/accept to swap items with other people.
    </p>
    
    @if (count($posts) > 0)
        <table class="post-table">
            <thead>
                <th class="post-table__cell">Would like to get</th>
                <th class="post-table__cell">Would like to trade</th>
                <th class="post-table__cell">Author</th>
                <th class="post-table__cell"><!-- Controls. Deliberately left empty. --></th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="post-table__cell">
                            {{ $post->want }}
                        </td>
                        <td class="post-table__cell">
                            {{ $post->have }}
                        </td>
                        <td class="post-table__cell">
                            {{ $post->user->name }}
                        </td>
                        <td class="post-table__cell post-table__cell--controls">
                            <a href="{{ route('viewpost', ['id' => $post->id]) }}" class="unstyled-link post-table__cell--controls__icon post-table__cell--controls__details-link">
                                <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
                                <span class="sr-only">Details</span>
                            </a>

                            @can("update", $post)
                                <a href="{{ route('updatepost', ['id' => $post->id]) }}" class="unstyled-link">
                                    <span class="glyphicon glyphicon-pencil post-table__cell--controls__icon" aria-hidden="true"></span>
                                    <span class="sr-only">Edit</span>
                                </a>
                            @endcan

                            @can("destroy", $post)
                                <form action="{{ route('deletepost', ['id' => $post->id]) }}" method="post" class="unstyled-inline-form post-table__cell--controls__icon">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="unstyled-inline-form__button">
                                        <span class="glyphicon glyphicon-trash post-table__cell--controls__icon" aria-hidden="true"></span>
                                        <span class="sr-only">Delete</span>
                                    </button>
                                </form>
                            @endcan
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ route('newpost') }}">
        <button type="button" class="btn btn-default">
            Add a new post
        </button>
    </a>
@endsection

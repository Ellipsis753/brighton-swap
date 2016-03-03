@extends("base")

@section("content")
    <p>
        Welcome to the website. Click <a href="{{ route('newpost') }}">here</a>.
    </p>
    
    
    @if (count($posts) > 0)
        <table class="table table-striped task-table">
            <thead>
                <th>Wants</th>
                <th>Has</th>
                <th>Details</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="table-text">
                            {{ $post->want }}
                        </td>
                        <td>
                            {{ $post->have }}
                        </td>
                        <td>
                            {{ $post->details }}

                            <form action="{{ route('deletepost', ['id' => $post->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit">delete</button>
                            </form>

                            <a href="{{ route('updatepost', ['id' => $post->id]) }}">Edit</a>
                            <a href="{{ route('viewpost', ['id' => $post->id]) }}">View</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif    
@endsection

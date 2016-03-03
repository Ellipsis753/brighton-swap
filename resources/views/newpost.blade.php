@extends("base")

@section("content")


    @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>Whoops! Something went wrong!</strong>
    
            <br><br>
    
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('createpost') }}" method="POST">
        {{ csrf_field() }}

        What item are you hoping to trade?
        <input type="text" name="have"><br />

        What are you looking for in exchange?
        <input type="text" name="want"><br />

        Details:
        <input type="text" name="details"><br />

        <button type="submit">Offer Trade</button>
    </form>
@endsection

@extends("layout.layout")
@section("content")


    <a href="{{route('tags.create')}}" class="btn btn-info mt-2">create</a>

    <form method="post" action="{{route('logout')}}">
        @csrf

        <button type="submit" class="btn btn-primary">logout</button>
    </form>

    @foreach ($tags as $tag)

        <div class="card mt-2" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $tag->name }}</h5>


                <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary">edit</a>
                <form method="post" action="{{route('tags.delete', $tag->id)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

    @endforeach

@endsection

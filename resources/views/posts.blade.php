@extends("layout.layout")
@section("content")

    @foreach ($posts as $post)

        <div class="card mt-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{$post->post_text }}</p>
                <h4 class="card-text">{{$post->likes }} likes</h4>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">edit</a>
                <form method="post" action="{{route('posts.delete', $post->id)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

    @endforeach

@endsection

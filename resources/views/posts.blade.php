@extends("layout.layout")
@section("content")

    <span>my name: {{$user->name}}</span>
    <a href="{{route('posts.create')}}" class="btn btn-info mt-2">create</a>

    <form method="post" action="{{route('logout')}}">
        @csrf

        <button type="submit" class="btn btn-primary">logout</button>
    </form>

    @foreach ($posts as $post)

        <div class="card mt-2" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{$post->post_text }}</p>
                <h4 class="card-text">{{$post->likes }} likes</h4>
                <h6 class="card-text">{{$post->user->name }}</h6>
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

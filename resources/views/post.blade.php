@extends("layout.layout")
@section("content")

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{$post->post_text }}</p>
            <h4 class="card-text">{{$post->likes }} likes</h4>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

@endsection

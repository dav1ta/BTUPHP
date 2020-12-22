@extends("layout.layout")
@section("content")

    <span>my name: {{$user->name ?? '' }}</span>
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
                @foreach($post -> tags -> pluck('name') as $tag)
                  <span>{{ $tag }}|</span>
                @endforeach
                <br/>
                @can('approve', $post)
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <form method="post" enctype="multipart/form-data" action="{{route('approve', $post->id)}}">
                            @csrf
                            @method("PUT")
                            <button type="submit" class="btn btn-info">approve</button>
                        </form>
                    </div>
                @endcan

                <br/>
                @if($post->is_liked)
                    <button type="submit" class="btn btn-info btn-fff yep"
                       url="{{route('is_liked', $post->id)}}"> liked</button>

                @else
                    <button type="submit" class="btn btn-info btn-fff no"
                       url="{{route('is_liked', $post->id)}}"> not liked</button>

                @endif
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">edit</a>
                <form method="post" action="{{route('posts.delete', $post->id)}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

    @endforeach


    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $(document).on('click', '.btn-fff', function (e) {
            e.preventDefault();
            $this = $(this);
            $.ajax({
                type: 'PUT',
                url: $this.attr('url'),
                success: function (msg) {
                    if ($this.hasClass('yep')){
                        $this.removeClass("yep");
                        $this.html("not liked");
                        $this.addClass("no");
                    }
                    else{
                        $this.removeClass("no");
                        $this.html('liked');
                        $this.addClass("yep");
                    }
                    console.log(msg);
                }
            });
        });
    </script>

@endsection

@extends("layout.layout")
@section("content")
    <form  method="post" enctype="multipart/form-data" action="{{route('posts.update', $post->id)}}">
        @csrf
        @method("PUT")
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Post Title</label>
                <input type="name" class="form-control"  value="{{old('title', $post->title)}}" placeholder="Name" name="title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Post Text</label>
                <input type="name" class="form-control"  placeholder="{{old('post_text', $post->post_text)}}" name="post_text">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Post Likes</label>
                <input type="name" class="form-control" value="{{old('likes', $post->likes)}}" placeholder="Name" name="likes">
            </div>
        </div>
        <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

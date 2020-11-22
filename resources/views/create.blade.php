
@extends("layout.layout")
@section("content")
<form  method="post" enctype="multipart/form-data" action="{{route('posts.save')}}">
{{--    @if($errors->any())--}}
{{--        @foreach($errors->all() as $error)--}}
{{--            {{ $error }}--}}
{{--        @endforeach--}}
{{--        @endif--}}
    <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Post Title</label>
            <input type="name" class="form-control"  placeholder="Name" name="title">
            @if($errors->has("title"))
                <p>{{$errors->first("title")}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Post Text</label>
            <input type="name" class="form-control {{$errors->first("post_text")? "is-invalid" : "" }}"  placeholder="Name" name="post_text">
                @if($errors->has("post_text"))
                    <p class="text-danger"> {{$errors->first("post_text")}}</p>
                @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Post Likes</label>
            <input type="name" class="form-control"  placeholder="Name" name="likes">
            @if($errors->has("likes"))
                <p>{{$errors->first("likes")}}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select name="tags[]" multiple class="form-control" id="exampleFormControlSelect2">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>


    </div>
    </div>
    <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection

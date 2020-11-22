@extends("layout.layout")
@section("content")
    <form  method="post" enctype="multipart/form-data" action="{{route('tags.save')}}">
        {{--    @if($errors->any())--}}
        {{--        @foreach($errors->all() as $error)--}}
        {{--            {{ $error }}--}}
        {{--        @endforeach--}}
        {{--        @endif--}}
        <div class="box-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Post Text</label>
                <input type="name" class="form-control {{$errors->first("name")? "is-invalid" : "" }}"  placeholder="Name" name="name">

            </div>

        </div>
        <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

@extends("layout.layout")
@section("content")
    <form method="post" action="{{route('auth')}}">
        @csrf
<input type="text" name="name" placeholder="name"/>
<input type="password" name="password" placeholder="password"/>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection

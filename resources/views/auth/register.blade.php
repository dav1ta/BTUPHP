@extends("layout.layout")
@section("content")
    <form method="post" action="{{route('adduser')}}">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="name"/>
          <input type="text" name="email" class="form-control" placeholder="email">
            <input type="password" name="password" class="form-control" placeholder="password" />

            <button type="Register" class="btn btn-primary">Login</button>
        </form>
@endsection

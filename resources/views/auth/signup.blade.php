@section('title','Signup')
@section('body')

    Aquí será el Signup

    <form action="{{route('signup')}}" method="post">
        @csrf

        <label for="username"> Nombre de Usuario:</label> <br>
        <input type="text" name="username" id="username" value="{{old('username')}}"><br>
        <label for="name"> Nombre de Usuario:</label> <br>
        <input type="text" name="name" id="name" value="{{old('name')}}"><br>
        <label for="email"> Nombre de Usuario:</label> <br>
        <input type="text" name="email" id="email" value="{{old('email')}}"><br>
        <label for="password"> Nombre de Usuario:</label> <br>
        <input type="text" name="password" id="password" value="{{old('password')}}"><br>

    </form>

@endsection


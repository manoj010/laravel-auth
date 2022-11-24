<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    @if(Session::has('fail'))
        <span>{{Session::get('fail')}}</span>
    @endif

    <form action="{{route('loginUser')}}" method="post">
        @csrf
        <div>
            <input type="text" name="email" id="" placeholder="Enter Email">
            <span>@error('email') {{$message}} @enderror</span>
        </div>
        <div>
            <input type="password" name="password" id="" placeholder="Enter Password">    
            <span>@error('password') {{$message}} @enderror</span>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
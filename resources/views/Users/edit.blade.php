<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{route('users.update',['user'=>$user])}}" method="POST" >
        @csrf 
        @method('PUT')
        <label for="name">Name</label>
        <input value="{{old('name',$user->name)}}" id="name" type="text" name="name">
        <button type="submit">Mentés</button>
    </form>
    user
    <p>{{$user->id}}</p>
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <p>{{$user->has2FA}}</p>
</body>
</html>
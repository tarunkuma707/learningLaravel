<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Register User</h1>
    <form action="{{ route('registeruser') }}" method="POST">
        @csrf
         <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <label for="Email">Email</label>
        <input type="text" name="email" value="{{ old('email') }}">
        <label for="password">Password</label>
        <input type="password" name="password" value="{{ old('password') }}">
        <button type="submit" value="submit">Submit</button>
    </form>
</body>
</html>
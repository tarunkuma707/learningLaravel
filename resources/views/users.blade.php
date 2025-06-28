<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/register">Register</a>
     @if (session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif
    <h1>All Users</h1>
    <table>
        <thead>
            <tr>
                <td><h1>Name</h1></td>
                <td><h1>Action</h1></td>
            </tr>
        </thead>
        <tbody>
        @foreach ($allusers as $item)
            <tr>
                <td>
                    {{ $item->name }}
                </td>
                 <td>
                    <a href="/udpate/{{ $item->id }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
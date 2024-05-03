<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('public/bootstrap-5.3.3-dist/css/bootstrap.min.css')}}">
    <title>Bootstrap demo</title>
</head>
<body>
<div class="container">
    @include('components.messages')
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="" aria-describedby="emailHelp" value="{{old('email')}}">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

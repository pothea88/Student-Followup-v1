<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-primary text-center mt-3">Welcome to comment board</h1>
        <hr>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Edit Comment</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('updateComment',$comments->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                           <div class="form-group">
                            <textarea name="comment" class="form-control">{{$comments->message}}</textarea>
                           </div>
<<<<<<< HEAD
                           <button type="submit" class="btn btn-primary float-right">update</button>
=======
                           <button type="submit" class="btn btn-primary float-right">Update</button>
>>>>>>> fa93dc81060dd7f45796266dd09dc4b7daf428eb
                           <a href="{{url('comment/viewComment',$comments->student->id)}}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>

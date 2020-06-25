<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Address</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->position}}</td>
                            <td>{{$user->address}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection -->

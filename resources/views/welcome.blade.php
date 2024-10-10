@extends('layout')

@section('heading')
    <h3 class="mt-2 text-center">
        All User List
    </h3>
@endsection

@section('content')
<a class="btn btn-primary" href="{{ route('user.create') }}">Create</a>
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th>
                    S. No
                </th>
                <th>
                    Name
                </th>
                <th>
                    City
                </th>
                <th>
                    Gender
                </th>
                <th>
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->user_gender }}</td>
                <td>{{ $user->user_city }}</td>
                <td>
                    <form action="{{ route('user.show', $user->user_id) }}" method="GET" style="display: inline-block;">
                        <button class="btn btn-success">Read</button>
                    </form>
                    <a href="{{ route('user.edit', $user->user_id) }}" class="btn btn-warning">Update</a>
                    <form action="{{route('user.destroy',$user->user_id)}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach        
        </tbody>
    </table>
@endsection

@extends('layout/app')

@section('content')
    <a href="/user/create" class="btn btn-primary">+Add User Data</a>
    <table class='table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Username</th>
                <th>User Type</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->UserType->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a class='btn btn-secondary btn-sm' href="{{ url('/user/'.$item->username) }}">Detail</a>
                        <a class='btn btn-warning btn-sm' href="{{ url('/user/'.$item->username.'/edit') }}">Edit</a>
                        <form onsubmit="return confirm('Are you sure to delete this data?')"  class='d-inline' action="{{ '/user/'.$item->username }}" method='post'>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type='submit'>Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
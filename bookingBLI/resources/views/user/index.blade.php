@extends('layout/app')

@section('content')
    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
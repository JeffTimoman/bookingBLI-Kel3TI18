@extends('layout/app')

@section('content')
    <div>
        <a href="/user" class="btn btn-secondary"><< Kembali</a>
        <h1>{{ $data->name }}</h1>
        <p>
            <b>Role</b> {{ $data->role }}
        </p>
        <p>
            <b>Username</b> {{ $data->username }}
        </p>
        <p>
            <b>User Type</b> {{ $data->UserType->name }}
        </p>
    </div>
@endsection
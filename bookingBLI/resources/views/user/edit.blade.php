@extends('layout/app')

@section('content')
<a href="/user" class="btn btn-secondary"><< Kembali</a>
<form method="POST" action="{{ '/user/'.$data->username }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
    </div>
    <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Role</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="User" name="role" value="{{ $data->role }}" readonly>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="{{ $data->username }}">
    </div> 
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="text" class="form-control" name="password" id="password" value="">
    </div> 
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">UserType</label>
        <select id="select" class="form-select" name="user_type_id" id="user_type_id" value="{{ $data->UserType->name }}">
            <option value="1">PPTI</option>
            <option value="2">PPBP</option>
            <option value="3">Trainee</option>
            <option value="4">DPP</option>
            <option value="5">Visitor</option>
        </select>
    </div> 
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
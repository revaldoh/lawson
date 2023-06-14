@extends('layout.dashboard')
@section('content')

<form action="{{ route('user.update', $user->user_id) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Different Width</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <label>Date Of Birth</label>
              <input  type="date" class="form-control" id="dob" name="dob" value="{{$user->date_of_birth}}">
              <br>
              <label>Address</label>
              <textarea  class="form-control " name="address" id="address">{{$user->address}}</textarea>
              <br>
              <label > Email</label>
              <input  type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
              <input type="submit"  class="btn btn-primary mt-4">
          </div>
          <div class="col-5">
            <label>Full Name</label>
              <input  type="text" class="form-control" id="name" name="name" value="{{$user->full_name}}">
              <br>
            <label>Phone</label>
              <input  type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
              <br>
              <label >Active</label>
                <select class="custom-select form-control-border" id="active" name="active">
                  <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>Non Active</option>
                </select>
          </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</form>
@endsection
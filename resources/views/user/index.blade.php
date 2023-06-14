

@extends('layout.dashboard')
@section('content')

<div class="col-6"><a  class="btn-lg btn-primary" href="{{ route('input_user') }}">Add User</a></div>
<br>
<div class="row">
  <div class="col-12 mt-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table User</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>DOB</th>
              <th>Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
              <tr>
                  <td>{{$user->user_idid}}</td>
                  <td>{{ $user->date_of_birth }}</td>
                  <td>{{ $user->full_name }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->active }}</td>
                  <td>
                    <form action="{{ route('user.destroy', ['user_id' => $user->user_id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this status?')">
                    @csrf
                    @method('DELETE')
                    <input class="btn-sm btn-danger" type="submit" value="Delete">
                   </form>
                    <a class="btn-sm btn-warning" href="{{ route('user.edit',$user->user_id) }}">Update</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>


@endsection



@extends('layout.dashboard')
@section('content')

<div><a  class="btn-lg btn-primary" href="{{ route('input') }}">Add Master Status</a></div>
<br>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table Status</h3>

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
              <th>Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($statuses as $status)
              <tr>
                  <td>{{ $status->status_id }}</td>
                  <td>{{ $status->name }}</td>
                  <td>{{ $status->description }}</td>
                  <td>
                    <form action="{{ route('master_status.destroy', ['status_id' => $status->status_id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this status?')">
                    @csrf
                    @method('DELETE')
                    <input class="btn-sm btn-danger" type="submit" value="Delete">
                   </form>
                    <a class="btn-sm btn-warning" href="{{ route('master_status.edit',$status->status_id) }}">Update</a>
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

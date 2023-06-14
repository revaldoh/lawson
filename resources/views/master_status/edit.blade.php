@extends('layout.dashboard')
@section('content')

<form action="{{ route('master_status.update', $status->status_id) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Different Width</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-5">
                <label>Name</label>
                <input  type="text"class="form-control" id="name" name="name" value="{{ $status->name }}">
                <br>
                <label>Description</label>
                <textarea class="form-control " name="desc" id="desc">{{ $status->description }}</textarea>
                <input type="submit"  class="btn btn-primary mt-4" value="Update">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</form>
@endsection
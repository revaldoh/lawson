

@extends('layout.dashboard')
@section('content')

<form action="{{ route('status.store') }}" method="post" >
    @csrf
    <div class="card card-primary">
        <div class="card-header">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-5">
                <label>Name</label>
                <input  type="text" class="form-control" id="name" name="name">
                <br>
                <label>Description</label>
                <textarea class="form-control " name="desc" id="desc"></textarea>
                <input type="submit"  class="btn btn-primary mt-4">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</form>
@endsection
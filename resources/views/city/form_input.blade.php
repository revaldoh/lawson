

@extends('layout.dashboard')
@section('content')

<form action="{{ route('city.store') }}" method="post" >
    @csrf
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form City</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-5">
                <label>City Name</label>
                <input  type="text" class="form-control" id="name" name="name">
                <br>
                <label>Longtitude</label>
                <input  type="text" class="form-control" id="long" name="long">
                <br>
                <label > Latitude</label>
                <input  type="text" class="form-control" id="lat" name="lat">
                <input type="submit"  class="btn btn-primary mt-4">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</form>
@endsection
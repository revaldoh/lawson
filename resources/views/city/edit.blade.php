@extends('layout.dashboard')
@section('content')

<form action="{{ route('city.update', $city->city_id) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Different Width</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <label>City Name</label>
              <input  type="text" class="form-control" id="name" name="name" value="{{ $city->name }}">
              <br>
              <label>Longtitude</label>
              <input  type="text" class="form-control" id="long" name="long" value="{{ $city->longitude }}">
              <br>
              <label > Latitude</label>
              <input  type="text" class="form-control" id="lat" name="lat" value="{{ $city->latitude   }}">
                <input type="submit"  class="btn btn-primary mt-4" value="Update">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</form>
@endsection
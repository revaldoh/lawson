@extends('layout.dashboard')

@section('content')
    <form action="{{ route('merchant.store') }}" method="post">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Merchant</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <br>
                        <label>Address</label>
                        <textarea class="form-control" name="address" id="address"></textarea>
                        <br>
                        <input type="submit" class="btn btn-primary mt-4">
                    </div>
                    <div class="col-5">
                      <label>City ID</label>
                      <select class="custom-select form-control-border" id="city_id" name="city_id">
                          @foreach ($cities as $city)
                              <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                          @endforeach
                      </select>                      
                        <br>
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                        <br>
                        <label>Expired Date</label>
                        <input type="date" class="form-control" id="exp" name="exp">
                        <br>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </form>
@endsection

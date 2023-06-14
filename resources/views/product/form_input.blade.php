@extends('layout.dashboard')

@section('content')
    <form action="{{ route('product.store') }}" method="post">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Product</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <br>
                        <label>Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                        <br>
                        <input type="submit" class="btn btn-primary mt-4">
                    </div>
                    <div class="col-5">
                      <label>Merchant ID</label>
                      <select class="custom-select form-control-border" id="merchant_id" name="merchant_id">
                          @foreach ($merchants as $merchant)
                              <option value="{{ $merchant->merchant_id}}">{{ $merchant->name }}</option>
                          @endforeach
                      </select>                      
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </form>
@endsection

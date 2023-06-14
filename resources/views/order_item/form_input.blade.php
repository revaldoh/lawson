@extends('layout.dashboard')

@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Product</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label>Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                        <br>
                        <label>Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty">
                        <br>
                        <input type="submit" class="btn btn-primary mt-4">
                    </div>
                    <div class="col-5">
                      <label>Product ID</label>
                      <select class="custom-select form-control-border" id="product_id" name="product_id">
                          @foreach ($products as $product)
                              <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                          @endforeach
                      </select>                      
                      <label>User ID</label>
                      <select class="custom-select form-control-border" id="user_id" name="user_id">
                          @foreach ($users as $user)
                              <option value="{{ $user->user_id }}">{{ $user->full_name }}</option>
                          @endforeach
                      </select>                      
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </form>
@endsection

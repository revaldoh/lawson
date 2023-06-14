@extends('layout.dashboard')

@section('content')
{{-- action="{{ route('order.update', $order->order_id) }}" --}}
    <form action="{{ route('order.update', $order->order_id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Product</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label>Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{$order->date}}">
                        <br>
                        <label>Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty" value="{{$order->quantity}}">
                        <br>
                        <input type="submit" class="btn btn-primary mt-4">
                    </div>
                    <div class="col-5">
                      <label>Product ID</label>
                      <select class="custom-select form-control-border" id="product_id" name="product_id">
                          @foreach ($products as $product)
                                <option value="{{ $product->product_id }}" {{ $product->product_id == $order->product_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                          @endforeach
                      </select>                      
                      <label>User ID</label>
                      <select class="custom-select form-control-border" id="user_id" name="user_id">
                          @foreach ($users as $user)
                                <option value="{{ $user->user_id }}" {{ $user->user_id == $order->user_id ? 'selected' : '' }}>
                                    {{ $user->full_name }}
                                </option>
                          @endforeach
                      </select>                      
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </form>
@endsection

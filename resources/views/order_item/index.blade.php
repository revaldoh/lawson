

@extends('layout.dashboard')
@section('content')

<div><a  class="btn-lg btn-primary" href="{{ route('input_order') }}">Add Product</a></div>
<div class="row">
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table Order</h3>
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
              <th>Order ID</th>
              <th>Date</th>
              <th>Quantity</th>
              <th>Product ID</th>
              <th>User ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($orders as $order)
              <tr>
                  <td>{{$order->order_id}}</td>
                  <td>{{ $order->date }}</td>
                  <td>{{ $order->quantity}}</td>
                  <td>{{ $order->product_id }}</td>
                  <td>{{ $order->user_id }}</td>
                  <td>
                    <form action="{{ route('order.destroy', ['order_id' => $order->order_id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this status?')">
                    @csrf
                    @method('DELETE')
                    <input class="btn-sm btn-danger" type="submit" value="Delete">
                   </form>
                    <a class="btn-sm btn-warning" href="{{ route('order.edit', $order->order_id)}}">Edit</a>
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

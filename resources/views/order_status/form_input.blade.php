

@extends('layout.dashboard')
@section('content')

<form action="{{ route('orderstat.store') }}" method="post" >
    @csrf
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Order Status</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
                <label>Order ID</label>
                <select class="custom-select form-control-border" id="order_id" name="order_id">
                  @foreach ($orders as $order)
                      <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                  @endforeach
              </select>     
                <br>
                <br>
                <label>Order Status</label>
                <select class="custom-select form-control-border" id="status_id" name="status_id">
                  @foreach ($statuss as $status)
                      <option value="{{ $status->status_id }}">{{ $status->name }}</option>
                  @endforeach
              </select>                    
              <br>
                <input type="submit"  class="btn btn-primary mt-4">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</form>
@endsection
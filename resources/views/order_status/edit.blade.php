@extends('layout.dashboard')
@section('content')

<form action="{{ route('orderstat.update', $orderstat->order_id) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="card-header">
      <h3 class="card-title">Form Status</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <label>Status ID</label>
          <select class="custom-select form-control-border" id="status_id" name="status_id">
            @foreach ($statuss as $status)
            <option value="{{ $status->status_id }}" {{ $orderstat->status_id == $status->status_id ? 'selected' : '' }}>
                  {{ $status->status_id }}
              </option>
              @endforeach
            </select>                    
            <input type="submit"  class="btn btn-primary mt-4">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </form>
  @endsection
  {{-- <label>Order ID</label>
  <select class="custom-select form-control-border" id="order_id" name="order_id">
    @foreach ($orders as $order)
        <option value="{{ $order->order_id }}">{{ $orderstat->order_id }}</option>
    @endforeach
</select>      --}}
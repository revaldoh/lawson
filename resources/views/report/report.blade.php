
@extends('layout.dashboard')
@section('content')
<br>
<div class="row">
  <div class="col-12">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
      Select Report
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{ route('exportByMonth', ['month' => $selectedMonth]) }}">Per Bulan</a></li>
      <li><a class="dropdown-item" href="{{ route('exportByProduct') }}">Per Product</a></li>
      <li><a class="dropdown-item" href="{{ route('exportByCity') }}">Per Kota</a></li>
    </ul>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table City</h3>
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
        <div class="dropdown">
        </div>
        <br>
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Product Name</th>
              <th>City</th>
              <th>User</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($reports as $report)
              <tr>
                  <td>{{ $report->order_id }}</td>
                  <td>{{ $report->date }}</td>
                  <td>{{ $report->product_name }}</td>
                  <td>{{ $report->city_name }}</td>
                  <td>{{ $report->user_name }}</td>
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



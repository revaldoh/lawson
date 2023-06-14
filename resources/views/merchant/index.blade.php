

@extends('layout.dashboard')
@section('content')

<div><a  class="btn-lg btn-primary" href="{{ route('input_merchant') }}">Add Merchant</a></div>
<div class="row">
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table User</h3>
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
              <th>ID</th>
              <th>Merchant Name</th>
              <th>City ID</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Expired Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($merchants as $merchant)
              <tr>
                  <td>{{$merchant->merchant_id}}</td>
                  <td>{{ $merchant->name }}</td>
                  <td>{{ $merchant->city_id}}</td>
                  <td>{{ $merchant->address }}</td>
                  <td>{{ $merchant->phone }}</td>
                  <td>{{ $merchant->expired_date }}</td>
                  <td>
                    <form action="{{ route('merchant.destroy', ['merchant_id' => $merchant->merchant_id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this status?')">
                    @csrf
                    @method('DELETE')
                    <input class="btn-sm btn-danger" type="submit" value="Delete">
                   </form>
                    <a class="btn-sm btn-warning" href="{{ route('merchant.edit',$merchant->merchant_id) }}">Update</a>
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

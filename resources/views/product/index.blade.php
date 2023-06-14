

@extends('layout.dashboard')
@section('content')

<div><a  class="btn-lg btn-primary" href="{{ route('input_product') }}">Add Product</a></div>
<div class="row">
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table Product</h3>
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
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Merchant ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($products as $product)
              <tr>
                  <td>{{$product->product_id}}</td>
                  <td>{{ $product->name }}</td>
                  <td>Rp {{ $product->price}}</td>
                  <td>{{ $product->merchant_id }}</td>
                  <td>
                    <form action="{{ route('product.destroy', ['product_id' => $product->product_id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this status?')">
                    @csrf
                    @method('DELETE')
                    <input class="btn-sm btn-danger" type="submit" value="Delete">
                   </form>
                    <a class="btn-sm btn-warning" href="{{ route('product.edit',$product->product_id)}}">Edit</a>
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

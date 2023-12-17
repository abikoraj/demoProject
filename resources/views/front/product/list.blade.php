@extends('front.layout')
@section('content')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <div class="d-flex justify-content-center align-items-center mt-md-4 mt-sm-0">

        <div class="bg-white px-5 py-3" style="width: 90%;">
            <div class="text-center pb-3 pt-2">
                <h2>Product List</h2>
                <hr class="my-4">
            </div>
            <table class="table table-striped" id="#example">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->quantity }} - {{ \App\Helper::getUnit() [$product->unit] }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->supplier_id }}</td>
                      <td>{{ $product->category_id }}</td>
                      <td>{{ $product->desc }}</td>
                      <td><a href=""
                        class="btn btn-primary btn-sm px-3">Edit</a>
                    </td>
                      
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection

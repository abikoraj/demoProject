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

        <div class="bg-white px-5 py-3" style="max-width: 800px;">
            <div class="text-center pb-3 pt-2">
                <h2>Edit Product</h2>
                <hr class="my-4">
            </div>
            <form action="{{ route('product.submit') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="col-md-4 mb-2">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name"
                            value="{{ $product->name }}" required>
                        <div class="invalid-feedback">
                            Please enter product name.
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity"
                            value="{{ $product->quantity }}" placeholder="Enter Quantity" required>
                        <div class="invalid-feedback">
                            Please enter quantity.
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="unit" class="form-label">Unit</label>
                        <select class="form-select" id="country" name="unit" required>
                            <option value="">Choose...</option>
                            @foreach (\App\Helper::getUnit() as $key => $unit)
                                <option value="{{ $key }}" {{ $key == $product->unit ? 'selected' : '' }}>{{ $unit }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select Unit.
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price"
                            value="{{ $product->price }}" required>
                        <div class="invalid-feedback">
                            Please enter Address.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select class="form-select" id="supplier_id" name="supplier_id" required>
                            <option value="">Choose...</option>
                            @foreach (App\Models\Supplier::all() as $supplier)
                                <option value="{{ $supplier->id }}" {{ $supplier->id == $product_id ? 'selected' : '' }}>
                                    {{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Supplier.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">Choose...</option>
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Category.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row gy-3">


                    <div class="col-md-12">
                        <label for="desc" class="form-label">Product Description</label>
                        <input type="text" class="form-control" name="desc" id="desc"
                            value="{{ $product->desc }}" placeholder="Description" required>
                        <div class="invalid-feedback">
                            Please enter Product Description.
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Add Product</button>
            </form>
        </div>
    </div>
@endsection

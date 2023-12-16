@extends('admin.layout')

@section('content')

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<div class="container py-4">

    <h2>Suppliers</h2>
    <hr>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <small>{{ session()->get('message') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h5 class="text-muted">Add Supplier</h5>
    <form action="{{ route('admin.supplier.submit') }}" method="post">
        @csrf
        <div class="row gy-2">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <input type="text" name="name" class="form-control" placeholder="Enter Suppiler Name" required value="{{ old('name') }}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <input type="number" name="contact" class="form-control" placeholder="Enter Contact" required value="{{ old('contact') }}">
                <span class="text-danger">@error('contact'){{ $message }} @enderror</span>
            </div>

            <div class="col-md-2 col-sm-12">
                <button type="submit" class="btn btn-outline-success px-md-5 px-sm-2 w-100">Add</button>
            </div>
        </div>
    </form>

    <hr class="mt-4">
    <h5 class="text-muted d-inline">Supplier List </h5>
    <!-- <small class="text-muted ">(10 Entries)</small> -->

    <div>
        <table class="table" id="example">
            <tr>
                <th>
                    #id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Contact
                </th>
                <th>
                    Action
                </th>
                <th>

                </th>
            </tr>

            @foreach ($suppliers as $supplier)
            <tr>
                <form action="{{ route('admin.supplier.update', ['supplier' => $supplier->id]) }}" method="POST">

                    @csrf
                    <td>
                        {{ $supplier->id }}
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" placeholder="Username" required value="{{ $supplier->name }}">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="contact" placeholder="contact" required value="{{ $supplier->contact }}">
                    </td>
                    <td>
                        <input type="submit" class=" btn btn-primary" value="Update">
                        <a href="{{ route('admin.supplier.delete', ['supplier'=> $supplier->id]) }}" class="btn btn-danger">
                            Delete</a>
                    </td>

                </form>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection
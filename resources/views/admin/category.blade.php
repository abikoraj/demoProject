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

    <h2>Categories</h2>
    <hr>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <small>{{ session()->get('message') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h5 class="text-muted">Add New category</h5>
    <form action="{{ route('admin.category.submit') }}" method="post">
        @csrf
        <div class="row gy-2">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required value="{{ old('name') }}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <button type="submit" class="btn btn-outline-success px-md-5 px-sm-2 w-100">Add</button>
            </div>
        </div>
    </form>

    <hr class="mt-4">
    <h5 class="text-muted d-inline">Category List </h5>
    <!-- <small class="text-muted ">(10 Entries)</small> -->

    <div>
        <table class="table" id="example">
            <tr>
                <th>
                    #Id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Action
                </th>
                <th>

                </th>
            </tr>

            @foreach ($categories as $category)
            <tr>
                <form action="{{ route('admin.category.update', ['category' => $category->id]) }}" method="POST">
                    @csrf
                    <td>
                        {{ $category->id }}
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" placeholder="Username" required value="{{ $category->name }}">
                    </td>
                    <td>
                        <input type="submit" class=" btn btn-primary" value="Update">
                        <a href="{{ route('admin.category.delete', ['category'=> $category->id]) }}" class="btn btn-danger">
                            Delete</a>
                    </td>

                </form>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection
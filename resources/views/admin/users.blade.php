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

        <h2>Users</h2>
        <hr>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <small>{{ session()->get('message') }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h5 class="text-muted">Add New User</h5>
        <form action="{{ route('admin.user.submit') }}" method="post">
            @csrf
            <div class="row gy-2">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <input type="text" name="name" class="form-control" placeholder="Enter Username" required
                        value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" required
                        value="{{ old('phone') }}">
                    <span class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <input type="password" name="password" class="form-control" placeholder=" Enter Password" minlength="8"
                        required>
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col-md-2 col-sm-12">
                    <button type="submit" class="btn btn-outline-success px-md-5 px-sm-2 w-100">Add</button>
                </div>
            </div>
        </form>

        <hr class="mt-4">
        <h5 class="text-muted d-inline">Users List </h5>
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
                        Phone
                    </th>
                    <th>
                        Action
                    </th>
                    <th>

                    </th>
                </tr>

                @foreach ($users as $user)
                    <tr>
                        <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST">

                            @csrf
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                <input type="text" class="form-control" name="name" placeholder="Username" required
                                    value="{{ $user->name }}">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="phone" placeholder="Phone" required
                                    value="{{ $user->phone }}">
                            </td>
                            <td>
                                <input type="submit" class=" btn btn-primary" value="Update">
                                <a href="{{ route('admin.user.delete', ['user' => $user->id]) }}" class="btn btn-danger">
                                    Delete</a>
                            </td>

                        </form>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

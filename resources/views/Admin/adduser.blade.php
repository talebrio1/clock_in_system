@extends('header.admindashboard')
@section('title', 'Add User')

@section('content')
    <div class="fs-1 fw-bold my-5">Add User</div>
    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @if (session('success'))
            <span class="text-success lead">{{ session('success') }}</span>
        @endif
        @if (session('errors'))
            <span class="text-danger2 lead">{{ session('errors') }}</span>
        @endif
        @csrf
        <div class="row ">
            <div class="col-md-8 p-3 border border-secondary-subtle">
                <hr class="bg-secondary my-5">
                <div class="row form-group d-flex justify-content-center">
                    <label class="col-md-3 control-label m-right mt-2" for="name">Name:</label>
                    <div class="col-md-9 ">
                        <input type="text" name="name" id="name" class="p-2 w-100 border-secondary-subtle">
                    </div>

                </div>
                <div class="row form-group d-flex justify-content-center mt-4">
                    <label class="col-md-3 control-label m-right mt-2">Email:</label>
                    <div class="col-md-9 ">
                        <input type="email" name="email" class="p-2 w-100 border-secondary-subtle">
                    </div>

                </div>
                <div class="row form-group d-flex justify-content-center mt-4">
                    <label class="col-md-3 control-label m-right mt-2">Password:</label>
                    <div class="col-md-9 ">
                        <input type="password" name="password" class="p-2 w-100 border-secondary-subtle">
                    </div>
                </div>
                <div class="row form-group d-flex justify-content-center mt-4">
                    <label class="col-md-3 control-label m-right mt-2">Confirm Password:</label>
                    <div class="col-md-9 ">
                        <input type="password" name="confirm_password" class="p-2 w-100 border-secondary-subtle">
                    </div>
                </div>
                <div class="row form-group d-flex justify-content-center mt-4">
                    <label class="col-md-3 control-label m-right mt-2">Image:</label>
                    <div class="col-md-9 ">
                        <input type="file" accept="image/*" name="image" class="p-2 w-100 border-secondary-subtle">
                    </div>

                </div>
                <div class="row form-group d-flex justify-content-center mt-4">
                    <label class="col-md-3 control-label m-right mt-2">Category Type:</label>
                    <div class="col-md-9 ">
                        <select name="category_type" id="" class="p-2 w-25">
                            @foreach ($categories as $category)
                                <option>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row form-group d-flex justify-content-center mt-4">
                    <input type="hidden" name="user_type" value="user">

                </div>
                <div class="row  my-5">
                    <div class="col-sm-12 text-right d-flex justify-content-end">
                        <button type="submit" class="btn bg-btn mx-4">Create</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection

@extends('header.appbar')
@section('title', 'sign up')

@section('content')
    <div class="row justify-content-end login-margin-top mb-4">
        <div class="col-md-4 col-sm-12 login-margin-right">
            <section class="bg-white border rounded p-4">

                <div class="mb-5">
                    <h3 class="display-6">Sign up</h3>
                </div>

                <form action="{{ route('register.store') }}" method="POST">
                    @if (session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>

                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="text" class="form-control" id="name" aria-describedby="email"
                                name="name">
                               
                        </div>
                        @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" aria-describedby="email"
                                name="email">
                               
                        </div>
                        @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-2">
                        <label for="image" class="form-label">Image</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="file" class="form-control" id="email" aria-describedby="image"
                                name="image">
                                
                        </div>
                        @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                                @endif
                    </div>
                    <div class="mb-2">
                        <input type="hidden" value="admin" name="category_type">

                    </div>
                    <div class="mb-2">
                        <input type="hidden" value="admin" name="user_type">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        @if ($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="confirm_password">
                        </div>
                        @if (session('error'))
                            <div class="text-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary shadow p-3 mt-2 ">Submit</button>
                    </div>
                </form>

            </section>

        </div>

    </div>


@endsection

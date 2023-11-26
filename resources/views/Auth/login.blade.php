@extends('header.appbar')
@section('title', 'Login')

@section('content')
    <div class="row justify-content-end login-margin-top mb-4">
        <div class="col-md-4 col-sm-12 login-margin-right">
            <section class="bg-white border rounded p-4">

                <div class="mb-5">
                    <h3 class="display-6">Login</h3>
                    <small class="text-secondary">Lgin into your account to continue</small>
                </div>

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    @if (session('error'))
                    <p class="lead text-danger">{{ session('error') }}</p>
                        
                    @endif
                    @if (session('success'))
                    <p class="lead text-success">{{ session('success') }}</p>
                        
                    @endif
                    <div class="mb-5">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="email">
                        </div>
                        @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label class="form-label d-flex justify-content-between align-items-center" for="exampleInputPassword1">
                           <span>Password</span> 
                            <a href="{{ route('forget.password') }}" class="float-right small text-decoration-none">I forgot password</a>
                          </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">

                        </div>
                    </div>
                    @if ($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary shadow p-3 mt-2 ">Submit</button>
                    </div>
                </form>            

            </section>

        </div>

    </div>


@endsection

{{-- margin-top: -376px;
    position: absolute;
    margin-left: 800px; --}}

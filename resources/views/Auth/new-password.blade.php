@extends('header.appbar')
@section('title', 'new password')

@section('content')
    <div class="row justify-content-end login-margin-top mb-4">
        <div class="col-md-4 col-sm-12 login-margin-right">
            <section class="bg-white border rounded p-4">

                <div class="mb-5">
                    <h3 class="display-6">Enter New Password</h3>
                </div>

                <form action="{{ route('reset.password.post') }}" method="POST">
                    @csrf
                    @if (session('error'))
                    <p class="lead text-danger">{{ session('error') }}</p>
                        
                    @endif
                    <input type="text" hidden value="{{ $token }}" name="token">
                    <div class="mb-5">
                        <label for="exampleInputEmail1" class="form-label">new Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                           
                        </div>
                        @if($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                    </div>

                    <div class="mb-5">
                        <label class="form-label" for="exampleInputPassword1">Confirm Password 
                          </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password">

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


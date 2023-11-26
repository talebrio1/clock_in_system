@extends('header.appbar')
@section('title', 'forget password')

@section('content')

<div class="row justify-content-end login-margin-top mb-4">
        <div class="col-md-4 col-sm-12 login-margin-right">
            <section class="bg-white border rounded p-4">

                <div class="mb-5">
                    <h3 class="display-6">Reset Password</h3>
                </div>

                <form class="card" action="{{ route('forgetPassword.reset') }}" method="POST">
                    @csrf
                    @if (session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                    <div class="card-body p-6">
                      <div class="card-title">Forgot password</div>
                      <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
                     
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
                         name="email">
                         @if($errors->has('email'))
                         <p class="text-danger">{{ $errors->first('email') }}</p>
                     @endif
                      </div>
                      <div class="form-footer mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Send me new password</button>
                      </div>
                    </div>
                  </form>          
                  <div class="text-center text-muted mt-3">
                    Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
                  </div>
            </section>

        </div>
 
        
    </div>
           
          

@endsection


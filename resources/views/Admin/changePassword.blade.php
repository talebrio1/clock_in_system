@extends('header.admindashboard')
@section('title', 'new password')

@section('content')
<div class="col-md-6 mx-auto p-2">
    <form class="card" action="{{ route('password.store') }}" method="POST">
        @csrf
        @method('PATCH')
        @if (session('success'))
        <span class="text-success lead">{{ session('success') }}</span>
    @endif
      <div class="card-header">
        <h3 class="card-title text-center">Change Password</h3>
      </div>
      <div class="card-body">
      
    @if (session('error'))
        <span class="text-danger lead">{{ session('error') }}</span>
    @endif
        <div class="mb-3">
            <label class="form-label required">Old Password</label>
            <div>
            <input type="password" name="old_password" class="form-control" placeholder="Password">
          </div>
          @if ($errors->has('old_password'))
          <p class="text-danger">{{ $errors->first('old_password') }}</p>
          @endif
        </div>
        <div class="mb-3">
          <label class="form-label required"> New Password</label>
          <div>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          @if ($errors->has('password'))
          <p class="text-danger">{{ $errors->first('password') }}</p>
          @endif
        </div>
        @if (session('error'))
        <span class="text-danger lead">{{ session('errorss') }}</span>
    @endif
        <div class="mb-3">
           
            <label class="form-label required">Confirm Password</label>
            <div>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
            </div>
            
          </div>
        
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

@endsection
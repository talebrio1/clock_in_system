@extends('header.userdashboard')

@section('title', 'profile')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
              <div class="card-title">My Profile</div>
              <div class="mb-2">
                <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-secondary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6l0 13"></path><path d="M12 6l0 13"></path><path d="M21 6l0 13"></path></svg>
                Company: <strong>{{ $user->profile->company ?? ""}}</strong>
              </div>
              <div class="mb-2">
                <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-secondary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path><path d="M12 12l0 .01"></path><path d="M3 13a20 20 0 0 0 18 0"></path></svg>
                Email: <strong>{{ $user->email ?? ""   }}</strong>
              </div>
              <div class="mb-2">
                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-secondary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                Adress: <strong>{{ $user->profile->address ?? ""}}</strong>
              </div>
              <div class="mb-2">
                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-secondary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                City: <strong>{{ $user->profile->city ?? "" }}</strong>
              </div>
              <div class="mb-2">
                <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-secondary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                Country: <strong><span class="flag flag-country-si"></span>
                    {{ $user->profile->country ?? ""}}</strong>
              </div>
              
            </div>
          </div>
          <div class="card mt-5">
            <div class="card-body">
              <h2 class="card-title">About Me</h2>
              <div>
                <p>{{ $user->profile->about_me ?? "" }} </p>
              </div>
            </div>
          </div>
    </div>
 <div class="col-lg-8 ">
    @if (session('success'))
            <span class="text-success lead">{{ session('success') }}</span>
        @endif
    <form class="card" action="{{ route('profile.store.user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
      <div class="card-body">
        <h3 class="card-title">Edit Profile</h3>
        <div class="row">
          <div class="col-md-5 mt-3">
            <div class="form-group">
              <label class="form-label">Company</label>
              <input type="text" class="form-control" name="company" placeholder="Company" value="Creative Code Inc.">
            </div>
          </div> 
          <div class="col-sm-6 col-md-6 mt-3">
            <div class="form-group">
              <label class="form-label"> Name</label>
              <input type="text" name="name" class="form-control" placeholder="name" value="{{ $user->name }}">
            </div>
            @if ($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
          </div>
          <div class="col-sm-6 col-md-6 mt-3">
            <div class="form-group">
              <label class="form-label"> profile pic</label>
              <input type="file" name="profile" class="form-control" placeholder="image" value="{{ $user->image }}">
            </div>
            @if ($errors->has('profile'))
          <p class="text-danger">{{ $errors->first('profile') }}</p>
          @endif
          </div>
         
          <div class="col-md-6 mt-3">
            <div class="form-group">
              <label class="form-label">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Home Address">
            </div>
          </div>
          <div class="col-sm-6 col-md-4 mt-3">
            <div class="form-group">
              <label class="form-label">City</label>
              <input type="text" name="city" class="form-control" placeholder="City">
            </div>
          </div>

          <div class="col-md-5 mt-3">
            <div class="form-group">
              <label class="form-label">Country</label>
              <input type="text" name="country" class="form-control" placeholder="Country">
            </div>
          </div>
          <div class="col-md-12 mt-3">
            <div class="form-group mb-0">
              <label class="form-label">About Me</label>
              <textarea rows="5" name="bio" class="form-control" placeholder="Here can be your description">

        </textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary me-auto">Update Profile</button>
      </div>
    </form>
  </div>
</div>
@endsection

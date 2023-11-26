@extends('header.admindashboard')
@section('title','dashboard')

@section('content')
   <div class="row">
    <div class="col-12">
        <span class="text-dark fs-2">Dashboard</span>
    </div>
    <div class="col-md-4 mt-5 my-md-5">
        <div class="card text-bg-danger mb-3 h-100">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>
              <p class="card-text fw-bold fs-2">20</p>
            </div>
            <div class="card-header border-top border-secondary bg-secondary d-flex justify-content-end">
                <a href="" class="text-white text-decoration-none">View all</a>
                <i class="bi bi-chevron-right "></i>
            </div>
          </div>
    </div>
    <div class="col-md-4 my-2 my-md-5">
        <div class="card text-bg-success mb-3 h-100">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>
              <p class="card-text fw-bold fs-2">20</p>
            </div>
            <div class="card-header border-top border-secondary bg-secondary d-flex justify-content-end">
                <a href="" class="text-white text-decoration-none">View all</a>
                <i class="bi bi-chevron-right "></i>
            </div>
          </div>
    </div>
    <div class="col-md-4 my-2 my-md-5">
        <div class="card text-bg-primary mb-3 h-100">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>
              <p class="card-text fw-bold fs-2">20</p>
            </div>
            <div class="card-header border-top border-secondary bg-secondary d-flex justify-content-end">
                <a href="" class="text-white text-decoration-none">View all</a>
                <i class="bi bi-chevron-right "></i>
            </div>
          </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="border">
                <div class="row my-5">
                    <div class="col-5 d-flex justify-content-start">
                        <form action="./" class="form-inline filters-form">
                            
                            <span class="d-flex">
                                <label class="grey mx-3 my-2" for="showcount">Show:</label>
                                <select class="form-control showcount" name="showcount" id="showcount">
                                    <option value="10" selected>10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </span>
                        </form>

                    </div>
                    <div class="col-7 w-25 ms-auto mx-3">
                        <form action="" class=" d-none d-md-block">
                            <div class="input-group my-2">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <table class="table table-striped table-bordered    ">
                            <thead class="table-secondary	">
                                <tr>
                                  <th class="p-3">Picture</th>
                                  <th class="p-3">Name</th>
                                  <th class="p-3">Category</th>
                                  <th class="p-3">Clock-in Time</th>
                                  <th class="p-3">Clock-Out Time</th>
                                  <th class="p-3">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($clocks as $clock)
                                <tr>
                                  <td class="p-3"><img src="{{ $clock->user->image }}" alt="" style="height: 50px; width: 50px; object-fit: cover; border-radius: 5px;"></td>
                                  <td class="p-3">{{ $clock->user->name }}</td>
                                  <td class="p-3">{{ $clock->user->category_type }}</td>
                                  <td class="p-3">{{ $clock->clock_in }}</td>
                                  <td class="p-3">{{ $clock->clock_out }}</td>
                                  <td class="p-3">{{ $clock->date }}</td>
                                </tr> 
                                @endforeach
                                                   
                              </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
          
        </div>
    </div>
   </div>
@endsection
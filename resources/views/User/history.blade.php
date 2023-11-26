@extends('header.userdashboard')
@section('title','History')

@section('content')
    <div class="fs-1 fw-bold my-5">History</div>
    <div class="row my-3">
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
                                  <th class="p-3">Clock-in Time</th>
                                  <th class="p-3">Clock-Out Time</th>
                                  <th class="p-3">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($clocks as $clock)

                                <tr>
                                  <td class="p-3"><img src="{{ $user->image }}" alt="" style="width: 50px; height:50px; object-fit:cover; border-raduis:5px"></td>
                                  <td class="p-3">{{ $user->name }}</td>
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

@endsection


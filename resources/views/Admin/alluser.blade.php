@extends('header.admindashboard')
@section('title','All User')

@section('content')
    <div class="fs-1 fw-bold my-5">All User</div>
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
                                  <th class="p-3">Email</th>
                                  <th class="p-3">Category Type</th>
                                  <th class="p-3">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="p-3"><img src="{{ $user->image }}" alt="" style="height: 50px; width: 50px; object-fit: cover; border-radius: 5px;"></td>
                                    <td class="p-3">{{ $user->name }}</td>
                                    <td class="p-3">{{ $user->email }}</td>
                                    <td class="p-3">{{ $user->category_type }}</td>
                                    <td class="p3 mr-5">
                                      <a href="{{ route('user.edit', $user->id) }}"><i class="bi bi-pencil-square fs-size text-dark"></i></a>
                                      <a href="{{ route('user.destroy',$user->id) }}" ><i class="bi bi-trash3 fs-size text-dark"></i></a>
                                  </td>
                                @endforeach
                                
                                                  
                              </tbody>
                        </table>
                    </div>
                </div>
              
            </div>
          
        </div>
    </div>

@endsection


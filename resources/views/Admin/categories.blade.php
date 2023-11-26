@extends('header.admindashboard')
@section('title','Categories')

@section('content')
    <div class="row bg-white border-bottom border-secondary-subtle my-4 p-2">
        <div class="col me-auto">
            <span class="text-dark p-2 fw-bold">Categories</span>
        </div>
        <div class="col d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Create</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create a Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Name</label>
                    <input type="text" class="form-control" id="recipient-name" name="category_name">
                </div>
         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
        </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="border">
                <div class="row my-1">
                    <div class="col-5 d-flex justify-content-start">
                        <form action="./" class="form-inline filters-form">
                            
                            <span class="d-flex">
                                <label class="grey mx-3 my-2" for="showcount">Show:</label>
                                <select class="form-control showcount" name="showcount" id="showcount">
                                    <option value="10" selected>10</option>
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
                <div class="row p-3 d-flex justify-content-center">
                    <div class="col-6 ">
                        <table class="table table-striped table-bordered    ">
                            <thead class="table-secondary	">
                                <tr>
                                  <th class="p-3">Name</th>
                                  <th class="p-3">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td class="p-3">{{ $category->name }}</td>
                                    <td class="p3 mr-5">
                                      <a href="{{ route('categories.delete', $category->id) }}" ><i class="bi bi-trash3 fs-size text-dark"></i></a>
                                  </td>
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

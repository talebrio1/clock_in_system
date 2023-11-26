<div class="row">

    <div class="col-12 mt-5 mt-md-1 mx-md-1 mx-5">
        <span class="text-dark fs-2">Dashboard </span>
    </div>
    
    <div class="row ">
        @if (session('error'))

            <span class="my-5"> {{ session('error') }}</span>

        @endif

        <div class=" col-md-6 d-flex border border-secondary-subtle rounded p-3 mx-md-1 mx-5 mt-5">

            <div class=" bg-primary p-1 rounded " style="width: 60px d-flex align-items-center">
                <i class="bi bi-clock text-white fs-2 mt-5 mx-2"></i>
            </div>

            <div class="ms-auto">
                @if ($user_status == 0 || $user_status == 2)
                    <form wire:submit="save" method="POST" id="form1">
                        @csrf
                        {{-- <input type="hidden" name="status" value="1"> --}}
                        <input wire:model="clock_in" type="hidden" name="clock_in" id="clock-time">
                        <button type="submit" class="btn btn-lg clock-in">
                            <i class="bi bi-box-arrow-right text-danger"></i>
                            <span class="text-danger">Clock in</span>
                        </button>
                        <div wire:loading class="spinner-border text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                    </form>
                    <span class="mx-2 in">You are currently out</span>
                @elseif ($user_status == 1 )
                    <form wire:submit="save"  id="form2">
                        @csrf
                        {{-- <input type="hidden" name="status" value="2"> --}}
                        <input wire:model="clock_out" type="hidden" id="clock-time" >
                        <button type="submit" class="btn btn-lg clock-out ">
                            <i class="bi bi-box-arrow-right text-success"></i>
                            <span class="text-success">Clock out</span>
                        </button>
                        <div wire:loading class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                    </form>
                    <span class=" out">You are currently in</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-5 mx-5 mx-md-1">
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
                                <input wire:model.live="search" type="text" class="form-control" placeholder="Search" aria-label="Search"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col table-responsive">
                        <table class="table table-striped table-bordered">
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
                                    <tr >
                                        <td class="p-3"><img src="{{ $clock->user->image }}" alt="" style="height: 50px; width: 50px; object-fit: cover; border-radius: 5px;"></td>
                                        <td class="p-3">{{ $clock->user->name }}</td>
                                        <td class="p-3">{{ $clock->clock_in}}</td>
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

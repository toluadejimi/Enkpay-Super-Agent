@extends('layout.home')
@section('content')


<div class="body-wrapper">


    <div class="container-fluid">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif

        <div class="row">



            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Assign New Terminal</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Assign Terminal to a customer</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-3">
                            <div class="text-center mb-n5">
                                <img src="{{url('')}}/public/assets2/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Customer Information</h5>
                    <form action="add-terminal" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                @if($user == null)

                                    <div class="form-floating mb-3">
                                        <select type="text" name="user_id" class="form-control" required>
                                            <option value="">Select an optiopn</option>
                                            @foreach($customers as $data)
                                                <option value="{{$data->id}}">{{$data->first_name}} {{$data->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="tb-fname">Select Customer</label>
                                    </div>

                                @else

                                <div class="form-floating mb-3">
                                    <input type="text" value="{{$user->first_name}} {{$user->last_name}}" disabled  name="name" class="form-control">
                                    <input type="text" value="{{$user->id}}" hidden  name="user_id" class="form-control" required>

                                    <label for="tb-fname">Select Customer</label>
                                </div>


                                    <div class="form-floating mb-3">
                                        <input type="text" value="{{$terminalNO}}" disabled  name="name" class="form-control">
                                        <input type="text" value="{{$user->id}}" hidden  name="user_id" class="form-control" required>

                                        <label for="tb-fname">Last Terminal No</label>
                                    </div>
                                @endif
                            </div>




                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="serial_no" placeholder="name@example.com" />
                                    <label for="tb-email">Terminal Serial Number</label>
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" required name="terminalNo" placeholder="" />
                                    <label for="tb-email">Terminal No</label>
                                </div>
                            </div>



                        </div>



                        <hr>



                        <div class="col-12">
                            <div class="d-md-flex align-items-center">

                                <div class="ms-auto mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-primary font-medium rounded-pill px-4">
                                        <div class="d-flex align-items-center">
                                            <i class="ti ti-send me-2 fs-4"></i>
                                            Assign
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>



            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card">

                    <div class="card-body">

                        <div class="card-heading">

                            <h6>Terminal List</h6>
                        </div>


                        <div class="table-responsive mb-4">
                            <table class="table border text-nowrap customize-table mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>

                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Customer Name</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Serial No</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Terminal No (TID)</h6>
                                        </th>

                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                        </th>

                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Date / Time</h6>
                                        </th>

                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Action</h6>
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($terminal as $data)

                                    <tr>

                                        <td>{{$data->user->first_name ?? "name"}} {{$data->user->last_name ?? "name"}}</td>
                                        <td><a href="/view-terminal?t_id={{($data->id)}}">{{($data->serial_no)}}</a> </td>
                                        <td>{{($data->terminalNo)}}</td>
                                        <td>
                                            @if($data->status == 1)
                                            <span class="badge bg-success-subtle rounded-3 py-2 text-success fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                                <iconify-icon icon="fluent-mdl2:check-mark"></iconify-icon>
                                                Active
                                            </span>
                                            @else
                                            @endif
                                        </td>


                                        <td>{{$data->created_at}}</td>


                                        <td>
                                            @if($data->status == 1)
                                              <a href="deactivate-terminal" class="btn btn-danger">De-Activate Terminal</a>
                                            @else
                                            @endif
                                        </td>













                                    </tr>

                                    @empty

                                    <tr>
                                        No record found
                                    </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>


                    </div>



                </div>








            </div>



        </div>
    </div>







    @endsection

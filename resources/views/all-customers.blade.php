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

        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">All Customers</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="home">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">View all Customers</li>
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
                <h5 class="mb-3">Search Customer</h5>
                <form action="search-customer" method="post">
                    @csrf


<div class="row">

                    <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"  name="name" placeholder="Enter Name here" />
                                <label for="tb-fname">Customer Name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"  name="phone" placeholder="name@example.com" />
                                <label for="tb-email">Phone number</label>
                            </div>
                        </div>

                         <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"  name="email" placeholder="name@example.com" />
                                <label for="tb-email">Email</label>
                            </div>
                        </div>


                    <div class="col-12">
                        <div class="d-md-flex align-items-center">

                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary font-medium rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-send me-2 fs-4"></i>
                                        Search
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

                        <h6>List of Customers</h6>
                    </div>


                    <div class="table-responsive mb-4">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Customer Name</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Phone</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Email</h6>
                                    </th>



                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Gender</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Address</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">State</h6>
                                    </th>

                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                    </th>

                            
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($customers as $data)

                                <tr>

                                    <td><a href="view-customer?id={{ $data->id }}">{{$data->first_name}} {{$data->last_name}}</td></a>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->gender}}</td>
                                    <td>{{$data->address_line1}}</td>
                                     <td>{{$data->state}}</td>

                                    <td>
                                        @if($data->status == 2)
                                        <span class="badge bg-success-subtle rounded-3 py-2 text-success fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="fluent-mdl2:check-mark"></iconify-icon>
                                            Verified
                                        </span>
                                        @elseif($data->status == 5)
                                        <span class="badge bg-danger-subtle rounded-3 py-2 text-danger fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="fluent-mdl2:check-mark"></iconify-icon>
                                            Blocked
                                        </span>
                                        @else

                                         <span class="badge bg-warning-subtle rounded-3 py-2 text-warning fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="fluent-mdl2:check-mark"></iconify-icon>
                                            Verification Pending
                                        </span>
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
</div>







@endsection

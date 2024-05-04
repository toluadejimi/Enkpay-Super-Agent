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
                        <h4 class="fw-semibold mb-8">Add New Customer</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="home">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Add New Customer</li>
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
                <form action="add-new" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="first_name" placeholder="Enter Name here" />
                                <label for="tb-fname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="last_name" placeholder="name@example.com" />
                                <label for="tb-email">Last Name</label>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <select type="text" name="gender" class="form-control" required>
                                    <option value="">Select an optiopn</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="tb-pwd">Gender</label>
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" required name="dob" placeholder="" />
                                <label for="tb-pwd">Date of Birth</label>
                            </div>
                        </div>

                    </div>

                    <hr>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="hos_no" placeholder="Enter Name here" />
                                <label for="tb-fname">House No</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="address_line_1" placeholder="" />
                                <label for="tb-email">Street</label>
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="city" placeholder="" />
                                <label for="tb-email">City</label>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="lga" placeholder="" />
                                <label for="tb-email">LGA</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="state" placeholder="" />
                                <label for="tb-email">State</label>
                            </div>
                        </div>





                    </div>


                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required name="phone" value="+234" placeholder="Enter Name here" />
                                <label for="tb-fname">Phone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" required name="email" placeholder="name@example.com" />
                                <label for="tb-email">Email</label>
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
                                        Create
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>



</div>
</div>







@endsection

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
                            <h4 class="fw-semibold mb-8">Compnay Information</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Set Company Information</li>
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
                    <h5 class="mb-3">Compnay Information / Data</h5>
                    <form action="edit-company" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" required value="{{$company->business_name}}" name="business_name" placeholder="" />
                                    <label for="tb-fname">Business Name</label>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="{{$company->business_id}}" disabled name="business_id" placeholder="" />
                                    <label for="tb-email">Business ID</label>
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="{{$company->business_email}}" name="business_email" placeholder="" />
                                    <label for="tb-email">Business Email</label>
                                </div>
                            </div>






                            <hr class="my-3">



                            <div class="row">
                            <div class="col-md-4">
                            <div class="form-floating mb-3">
                                   <input type="text" class="form-control" required value="{{$company->pos_charge}}" name="pos_charge" placeholder="" />
                                    <label for="tb-fname">POS Charge</label>
                                </div>
                                @php $charge = $company->pos_charge + $pos_charge @endphp
                                <span>POS Charge = {{$charge}}% </span>
                            </div>


                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="{{$company->transfer_charge}}"  name="transfer_charge" placeholder="" />
                                    <label for="tb-email">Transfer Charge</label>
                                </div>

                                 @php $tcharge = $company->transfer_charge + $transfer_charge @endphp
                                <span>Transfer Charge = NGN{{$tcharge}} </span>
                            </div>




                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="{{$company->bills_charge}}" name="bills_charge" placeholder="" />
                                    <label for="tb-email">Bills charge</label>
                                </div>

                                   @php $bcharge = $company->bills_charge + $bills_charge @endphp
                                <span>Bills Charge = NGN{{$bcharge}} </span>
                            </div>






                        </div>



                        <hr>






                        <div class="col-12">
                            <div class="d-md-flex align-items-center">

                                <div class="ms-auto mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-primary font-medium rounded-pill px-4">
                                        <div class="d-flex align-items-center">
                                            <i class="ti ti-send me-2 fs-4"></i>
                                            Update
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







    @endsection

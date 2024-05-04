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
                        <h4 class="fw-semibold mb-8">{{ $usr->first_name }} {{ $usr->last_name }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">User Data</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="../assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <img src="../assets/images/backgrounds/profilebg.jpg" alt="" class="img-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-1 order-2">
                        <div class="d-flex align-items-center justify-content-around m-4">
                            <div class="text-center">
                                <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                                <h6 class="mb-0 fw-semibold lh-1">₦{{ number_format($credit, 2) }}</h6>
                                <p class="mb-0 fs-4">Credit</p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                                <h6 class="mb-0 fw-semibold lh-1">₦{{ number_format($debit,2) }}</h6>
                                <p class="mb-0 fs-4">Debit</p>
                            </div>
                            <div class="text-center">
                                <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                                <h6 class="mb-0 fw-semibold lh-1">{{ number_format($pos,2) }}</h6>
                                <p class="mb-0 fs-4"> POS count</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div class=" d-flex align-items-center justify-content-center" style="width: 110px; height: 110px;" ;>
                                    <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;" ;>
                                        <img src="{{ $usr->identification_image }}" alt="" class="w-100 h-100">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $usr->first_name }} {{ $usr->last_name }}</h5>
                                <p class="mb-0 fs-4">Customer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 mx-4 pe-4 gap-3">
                            <li class="position-relative">
                                <a class="d-flex align-items-center justify-content-center text-bg-primary p-2 fs-4 rounded-circle" href="{{ $usr->phone }}" width="30" height="30">
                                    <i class="ti ti-phone"></i>
                                </a>
                            </li>
                            <li class="position-relative">
                                <a class="text-bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle" href="{{ $usr->email }}">
                                    <i class="ti ti-user"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-primary-subtle rounded-2 rounded-top-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                            <i class="ti ti-file-description me-2 fs-6"></i>
                            <span class="d-none d-md-block">Transactions</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button" role="tab" aria-controls="pills-followers" aria-selected="false">
                            <i class="ti ti-user-circle me-2 fs-6"></i>
                            <span class="d-none d-md-block">KYC</span>
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-terminal-tab" data-bs-toggle="pill" data-bs-target="#pills-terminal" type="button" role="tab" aria-controls="pills-terminal" aria-selected="false">
                            <i class="ti ti-terminal-2 me-2 fs-6"></i>
                            <span class="d-none d-md-block">Terminal</span>
                        </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button" role="tab" aria-controls="pills-friends" aria-selected="false">
                            <i class="ti ti-user-circle me-2 fs-6"></i>
                            <span class="d-none d-md-block">Friends</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button" role="tab" aria-controls="pills-gallery" aria-selected="false">
                            <i class="ti ti-photo-plus me-2 fs-6"></i>
                            <span class="d-none d-md-block">Gallery</span>
                        </button>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row">


                    <div class="table-responsive mb-4">
                        <table id="file_export" class="table border table-striped table-bordered display text-nowrap">
                            <thead class="text-dark fs-4">
                            <tr>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Refrence Number</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Customer Name</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Debit</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Credit</h6>
                                </th>

                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Balance</h6>
                                </th>

                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Type</h6>
                                </th>

                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Agent Fee</h6>
                                </th>

                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                </th>

                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Date / Time</h6>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($transactions as $data)

                                <tr>

                                    <td>{{$data->ref_trans_id}}</td>
                                    <td>{{$data->user->first_name}} {{$data->user->last_name}}</td>
                                    <td>₦{{number_format($data->debit ,2)}}</td>
                                    <td>₦{{number_format($data->credit ,2)}}</td>
                                    <td>₦{{number_format($data->balance ,2)}}</td>
                                    <td>
                                        @if($data->transaction_type == 'PURCHASE')
                                            <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            PURCHASE
                                        </span>
                                        @elseif($data->transaction_type == 'Purchase')
                                            <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            PURCHASE
                                        </span>
                                        @elseif($data->transaction_type == 'VirtualFundWallet')
                                            <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            WALLET FUNDING
                                        </span>
                                        @elseif($data->transaction_type == 'BankTransfer')
                                            <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-up-thin"></iconify-icon>
                                            BANK TRANSFER
                                        </span>
                                        @elseif($data->transaction_type == 'CashOut')
                                            <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            CASH OUT
                                        </span>

                                        @elseif($data->transaction_type == 'EP TRANSFER')
                                            <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            EP TRANSFER
                                        </span>
                                        @endif



                                    </td>

                                    <td>₦{{number_format($data->agent_fee ,2)}}</td>

                                    <td>
                                        @if($data->status == 1)
                                            <span class="badge bg-success-subtle rounded-3 py-2 text-success fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="fluent-mdl2:check-mark"></iconify-icon>
                                            Successful
                                        </span>
                                        @else
                                        @endif

                                    </td>


                                    <td>{{$data->created_at}}</td>








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


            <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab" tabindex="0">


                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">KYC Verifications</h3>

                </div>
                <div class="row">
                    <div class=" col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body p-4 d-flex align-items-center gap-6 flex-wrap">
                                <div>
                                    <h5 class="fw-semibold mb-0">Email Verification</h5>
                                    <span class="fs-2 d-flex align-items-center"></i>{{ $usr->email }}</span>
                                </div>
                                @if($usr->is_email_verified == 0)
                                <a href="verify-email?id={{$usr->id}}" class="btn btn-warning py-1 px-2 ms-auto">Verify Email</a>
                                @else
                                <button class="btn btn-outline-success py-1 px-2 ms-auto" disabled>Verified</button>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 col-xl-4">
                         <div class="card">
                            <div class="card-body p-4 d-flex align-items-center gap-6 flex-wrap">
                                <div>
                                    <h5 class="fw-semibold mb-0">Phone Verification</h5>
                                    <span class="fs-2 d-flex align-items-center"></i>{{ $usr->phone }}</span>
                                </div>
                                @if($usr->is_phone_verified == 0)
                                <a href="verify-phone?id={{$usr->id}}" class="btn btn-warning py-1 px-2 ms-auto">Verify Phone</a>
                                @else
                                <button class="btn btn-outline-success py-1 px-2 ms-auto" disabled>Verified</button>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body p-4 d-flex align-items-center gap-6 flex-wrap">
                                <div>
                                    <h5 class="fw-semibold mb-0">BVN Verification</h5>
                                    <span class="fs-2 d-flex align-items-center"></i>{{ Str::mask($usr->bvn, '*', -15, 6) }}</span>
                                </div>
                                @if($usr->is_bvn_verified == 0)
                                <a href="verify-bvn?id={{$usr->id}}" class="btn btn-warning py-1 px-2 ms-auto">Verify BVN</a>
                                @else
                                <button class="btn btn-outline-success py-1 px-2 ms-auto" disabled>Verified</button>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body p-4 d-flex align-items-center gap-6 flex-wrap">
                                <div>
                                    <h5 class="fw-semibold mb-0">NIN Verification</h5>
                                </div>
                                @if($usr->is_bvn_verified == 0)
                                <button href="verify-nin?id={{$usr->id}}" class="btn btn-warning py-1 px-2 ms-auto">Verify NIN</button>
                                @else
                                <button class="btn btn-outline-success py-1 px-2 ms-auto" disabled>Verified</button>
                                @endif

                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="tab-pane fade" id="pills-terminal" role="tabpanel" aria-labelledby="pills-terminal-tab" tabindex="0">

                <div class="table-responsive mb-4">
                    <table id="file_export" class="table border table-striped table-bordered display text-nowrap">
                        <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Serial Number</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Action</h6>
                            </th>


                        </tr>
                        </thead>
                        <tbody>

                        @forelse($terminal as $data)

                            <tr>

                                <td>{{$data->serial_no}}</td>

                                <td>
                                    @if($data->status == 0)
                                        <span class="badge bg-danger-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            INACTIVE
                                        </span>
                                    @else
                                        <span class="badge bg-primary-subtle rounded-3 py-2 text-primary fw-semibold fs-2 d-inline-flex align-items-center gap-1">
                                            <iconify-icon icon="mdi:arrow-down-thin"></iconify-icon>
                                            ACTIVE
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="#" class="btn btn-danger btn-sm">Delete Terminal</a>

                                </td>


                            </tr>

                        @empty

                            <div class="col-12 my-5 d-flex justify-content-center" >

                                <a href="terminal?user_id={{$user_id}}" class="btn btn-primary btn-sm">Add New Terminal</a>



                            </div>

                        @endforelse

                        </tbody>

                    </table>

                </div>



            </div>









            {{-- <div class="tab-pane fade" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab" tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Friends <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">20</span></h3>
                    <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Friends">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Betty Adams</h5>
                                <span class="text-dark fs-2">Medical Secretary</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-2.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Inez Lyons</h5>
                                <span class="text-dark fs-2">Medical Technician</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-3.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Lydia Bryan</h5>
                                <span class="text-dark fs-2">Preschool Teacher</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-4.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Carolyn Bryant</h5>
                                <span class="text-dark fs-2">Legal Secretary</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-5.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Paul Benson</h5>
                                <span class="text-dark fs-2">Safety Engineer</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-6.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Robert Francis</h5>
                                <span class="text-dark fs-2">Nursing Administrator</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-7.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Billy Rogers</h5>
                                <span class="text-dark fs-2">Legal Secretary</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-8.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Rosetta Brewer</h5>
                                <span class="text-dark fs-2">Comptroller</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-9.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Patrick Knight</h5>
                                <span class="text-dark fs-2">Retail Store Manager</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-10.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Francis Sutton</h5>
                                <span class="text-dark fs-2">Astronomer</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Bernice Henry</h5>
                                <span class="text-dark fs-2">Security Consultant</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-2.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Estella Garcia</h5>
                                <span class="text-dark fs-2">Lead Software Test Engineer</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-3.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Norman Moran</h5>
                                <span class="text-dark fs-2">Engineer Technician</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-4.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Jessie Matthews</h5>
                                <span class="text-dark fs-2">Lead Software Engineer</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-5.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Elijah Perez</h5>
                                <span class="text-dark fs-2">Special Education Teacher</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-6.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Robert Martin</h5>
                                <span class="text-dark fs-2">Transportation Manager</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-7.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Elva Wong</h5>
                                <span class="text-dark fs-2">Logistics Manager</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-8.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Edith Taylor</h5>
                                <span class="text-dark fs-2">Union Representative</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-9.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Violet Jackson</h5>
                                <span class="text-dark fs-2">Agricultural Inspector</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card hover-img">
                            <div class="card-body p-4 text-center border-bottom">
                                <img src="../assets/images/profile/user-10.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                <h5 class="fw-semibold mb-0">Phoebe Owens</h5>
                                <span class="text-dark fs-2">Safety Engineer</span>
                            </div>
                            <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                <li class="position-relative">
                                    <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                                        <i class="ti ti-brand-facebook"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-instagram"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-github"></i>
                                    </a>
                                </li>
                                <li class="position-relative">
                                    <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                                        <i class="ti ti-brand-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab" tabindex="0">
                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                    <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Gallery <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">12</span></h3>
                    <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Friends">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s1.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Isuava wakceajo fe.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Isuava wakceajo fe.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s2.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Ip docmowe vemremrif.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Ip docmowe vemremrif.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s3.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Duan cosudos utaku.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Duan cosudos utaku.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s4.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Fu netbuv oggu.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Fu netbuv oggu.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s5.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Di sekog do.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 14, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Di sekog do.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s6.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Lo jogu camhiisi.jpg</h6>
                                        <span class="text-dark fs-2">Thu, Dec 15, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Lo jogu camhiisi.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s7.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Orewac huosazud robuf.jpg</h6>
                                        <span class="text-dark fs-2">Fri, Dec 16, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Orewac huosazud robuf.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s8.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Nira biolaizo tuzi.jpg</h6>
                                        <span class="text-dark fs-2">Sat, Dec 17, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Nira biolaizo tuzi.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s9.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Peri metu ejvu.jpg</h6>
                                        <span class="text-dark fs-2">Sun, Dec 18, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Peri metu ejvu.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s10.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Vurnohot tajraje isusufuj.jpg</h6>
                                        <span class="text-dark fs-2">Mon, Dec 19, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Vurnohot tajraje isusufuj.jpg</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s11.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Juc oz ma.jpg</h6>
                                        <span class="text-dark fs-2">Tue, Dec 20, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Juc oz ma.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card hover-img overflow-hidden rounded-2">
                            <div class="card-body p-0">
                                <img src="../assets/images/products/s12.jpg" alt="" class="img-fluid w-100 object-fit-cover" style="height: 220px;">
                                <div class="p-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-semibold mb-0 fs-4">Povipvez marjelliz zuuva.jpg</h6>
                                        <span class="text-dark fs-2">Wed, Dec 21, 2023</span>
                                    </div>
                                    <div class="dropdown">
                                        <a class="text-muted fw-semibold d-flex align-items-center p-1" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu overflow-hidden">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Povipvez marjelliz zuuva.jpg</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<script>
    function handleColorTheme(e) {
        $("html").attr("data-color-theme", e);
        $(e).prop("checked", !0);
    }

</script>
<button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="icon ti ti-settings fs-7"></i>
</button>

<div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
        <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
            Settings
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" data-simplebar style="height: calc(100vh - 80px)">
        <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

        <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="theme-layout" id="light-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="light-layout"><i class="icon ti ti-brightness-up fs-7 me-2"></i>Light</label>

            <input type="radio" class="btn-check" name="theme-layout" id="dark-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="dark-layout"><i class="icon ti ti-moon fs-7 me-2"></i>Dark</label>
        </div>

        <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="ltr-layout"><i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR</label>

            <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="rtl-layout"><i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL</label>
        </div>

        <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

        <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
            <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">
                <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                    <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">
                <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                    <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">
                <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                    <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                    <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
                <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                    <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                    <i class="ti ti-check text-white d-flex icon fs-5"></i>
                </div>
            </label>
        </div>

        <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <div>
                <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="vertical-layout"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical</label>
            </div>
            <div>
                <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal</label>
            </div>
        </div>

        <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

        <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="boxed-layout"><i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed</label>

            <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="full-layout"><i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full</label>
        </div>

        <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
        <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <a href="javascript:void(0)" class="fullsidebar">
                <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="full-sidebar"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full</label>
            </a>
            <div>
                <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse</label>
            </div>
        </div>

        <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

        <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="card-with-border"><i class="icon ti ti-border-outer fs-7 me-2"></i>Border</label>

            <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off" />
            <label class="btn p-9 btn-outline-primary" for="card-without-border"><i class="icon ti ti-border-none fs-7 me-2"></i>Shadow</label>
        </div>
    </div>
</div>
</div>

<!--  Search Bar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
                <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                    <i class="ti ti-x fs-5 ms-3"></i>
                </a>
            </div>
            <div class="modal-body message-body" data-simplebar="">
                <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                <ul class="list mb-0 py-2">
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Detail</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="page-user-profile.html#">
                            <span class="fs-3 text-dark fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--  Shopping Cart -->
<div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">
            Shopping Cart
        </h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
    </div>
    <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
        <ul class="mb-0">
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="../assets/images/products/product-1.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success" type="button" id="add1">
                                    -
                                </button>
                                <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1" />
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" id="addo2">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="../assets/images/products/product-2.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success" type="button" id="add2">
                                    -
                                </button>
                                <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add2" value="1" />
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" id="addon34">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="../assets/images/products/product-3.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success" type="button" id="add3">
                                    -
                                </button>
                                <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add3" value="1" />
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" id="addon3">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="align-bottom">
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Sub Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$2530</span>
                </div>
            </div>
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$6830</span>
                </div>
            </div>
            <a href="eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
        </div>
    </div>
</div>


</div>

@endsection

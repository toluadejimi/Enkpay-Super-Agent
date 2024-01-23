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




                        <h4 class="fw-semibold mb-8">Hi, {{ Auth::user()->name }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
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
                <div class="row pb-4">
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="d-flex flex-column align-items-start w-100">
                            <div class="text-start">

                                <div class="d-flex align-items-center gap-3">
                                    <h2 class="mt-2 fw-bold">{{$device->device}}</h2>
                                    <span class="badge text-bg-primary  px-2 py-1 d-flex align-items-center">
                                        <i class=" fs-4"></i>@if($device->status == 1) ON @else OFF @endif</span>
                                </div>
                                <span>@if($device->status == 1) Device is currenlty on @else Device is currenlty off @endif</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="w-100">
                            <div>
                                <h6 class="mb-0">Device Wattage</h6>
                                <div class="d-flex align-items-center gap-3">
                                    <h2 class="mt-2 fw-bold">{{ $device->watt }}W</h2>
                                    <span class="badge text-bg-primary  px-2 py-1 d-flex align-items-center">
                                        <i class=""></i>@php $kw = $device->watt / 1000 @endphp {{ $kw }}(kW) </span>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="row gx-0">
                    <div class="col-md-4 border-end">
                        <div class="p-4 py-3 py-md-4">
                            <p class="fs-4 text-danger mb-0">
                                <span class="text-danger">
                                    <span class="round-8 text-bg-danger rounded-circle d-inline-block me-1"></span>
                                </span>Daily Energy Consumption
                            </p>
                            <h3 class=" mt-2 mb-0">{{ number_format($dailyConsumption) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 border-end">
                        <div class="p-4 py-3 py-md-4">
                            <p class="fs-4 text-primary mb-0">
                                <span class="text-primary">
                                    <span class="round-8 text-bg-primary rounded-circle d-inline-block me-1"></span>
                                </span>Carbon Intensity
                            </p>
                            <h3 class=" mt-2 mb-0">1,500</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 py-3 py-md-4">
                            <p class="fs-4 text-info mb-0">
                                <span class="text-info">
                                    <span class="round-8 text-bg-info rounded-circle d-inline-block me-1"></span>
                                </span>Daily Carbon Emissions
                            </p>
                            <h3 class=" mt-2 mb-0">560</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="row">


            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">

                        <h5 class="card-title fw-semibold">Device Activity</h5>
                        <p class="card-subtitle">Total hours active - {{ number_format($totalActive) }}H</p>

                        @forelse($activity as $data)


                        <div class="mt-9 py-6 d-flex align-items-center">

                            @if($data->status == 1)
                            <div class="flex-shrink-0 bg-primary-subtle text-primary rounded-circle round d-flex align-items-center justify-content-center">
                                <i class="ti ti-arrow-up fs-6"></i>
                            </div>
                            @else
                            <div class="flex-shrink-0 bg-danger-subtle text-danger rounded-circle round d-flex align-items-center justify-content-center">
                                <i class="ti ti-arrow-down fs-6"></i>
                            </div>
                            @endif


                            <div class="ms-3">
                                <h6 class="mb-0 fw-semibold">@if($data->status == 1) Device ON @else Device OFF @endif </h6>
                            </div>
                            <div class="ms-auto">
                                <span class="fs-2">{{ $data->created_at->diffForHumans() }}</span>
                            </div>
                        </div>


                        @empty

                        No activity found.

                        @endforelse





                    </div>
                </div>
            </div>


            {{-- <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold">
                                    Yearly Breakup
                                </h5>
                                <h4 class="fw-semibold mb-3">$36,358</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="me-1 rounded-circle bg-success-subtle round-20 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-arrow-up-left text-success"></i>
                                    </span>
                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                    <p class="fs-3 mb-0">last year</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="me-4">
                                        <span class="round-8 text-bg-primary rounded-circle me-2 d-inline-block"></span>
                                        <span class="fs-2">2023</span>
                                    </div>
                                    <div>
                                        <span class="round-8 bg-primary-subtle rounded-circle me-2 d-inline-block"></span>
                                        <span class="fs-2">2023</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-center">
                                    <div id="breakup"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>






    </div>
    @endsection

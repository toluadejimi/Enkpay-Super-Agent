@php use App\Models\Zone; @endphp
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
                                <h4 class="fw-semibold mb-8">Terminal Information</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none" href="home">Home</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">{{$ter->serial_no}}</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{url('')}}/public/assets2/images/breadcrumb/ChatBc.png" alt=""
                                         class="img-fluid mb-n4"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Terminal's Data</h5>
                        <form action="edit-company" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" required value="{{$ter->serial_no}}" disabled name=" "
                                               placeholder="" />
                                        <label for="tb-fname">Serial No</label>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="{{$ter->terminalNo}}" disabled name="business_id"
                                               placeholder=""/>
                                        <label for="tb-email">Terminal No</label>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" disabled value="{{$ter->merchantName}}" name=""
                                               placeholder=""/>
                                        <label for="tb-email">Merchant Name</label>
                                    </div>
                                </div>






                                @if($ter->geo_fence_id == null)

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" disabled value="{{"NO ZONE SET"}}"  name=""
                                                   placeholder="No Zone Set"/>
                                            <label for="tb-email">Geo-Fence Zone</label>
                                        </div>
                                    </div>


                                @else

                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            @php
                                            $zone = Zone::where('id', $ter->geo_fence_id)->first()->zone_name;
                                            @endphp
                                            <input type="text" class="form-control" disabled value="{{$zone}}" name=""
                                                   placeholder=""/>
                                            <label for="tb-email">Geo-Fence Zone</label>
                                        </div>
                                    </div>

                                @endif

                            </div>
                        </form>
                    </div>


                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Geo-Fence</h5>

                        <form action="set-geofence" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-control" required name="zone_id">
                                            <option value=" ">--Select Zone--</option>
                                        @foreach($zones as $data)
                                                <option value="{{$data->id}}">{{$data->zone_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="tb-email">Set Zone</label>

                                        <input name="serial_no" value="{{$ter->serial_no}}" hidden=>

                                    </div>
                                </div>



                                <hr class="my-3">



                                <div class="col-12">
                                    <div class="d-md-flex align-items-center">

                                        <div class="ms-auto mt-3 mt-md-0">
                                            <button type="submit" class="btn btn-primary font-medium rounded-pill px-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="ti ti-send me-2 fs-4"></i>
                                                    Set Zone
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>




                    </div>


                </div>





                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Test Geofencing</h5>


                        <button onclick="getLocation()">Get Current Location</button>


                        <form action="test-geofence" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input id="lat" class="form-control" required name="lat">
                                        <label for="tb-email">Latitude</label>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input id="lng" class="form-control" required name="lng">
                                        <label for="tb-email">Longitude</label>
                                        <input type="text" hidden value="{{$ter->serial_no}}" name="serial_no">

                                    </div>
                                </div>


                                <hr class="my-3">



                                <div class="col-12">
                                    <div class="d-md-flex align-items-center">

                                        <div class="ms-auto mt-3 mt-md-0">
                                            <button type="submit" class="btn btn-primary font-medium rounded-pill px-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="ti ti-send me-2 fs-4"></i>
                                                    Continue
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <script>
                            function getDeviceLocation() {
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                        const lat = position.coords.latitude;
                                        const lng = position.coords.longitude;

                                        // Log values to the console for debugging
                                        console.log('Latitude: ' + lat);
                                        console.log('Longitude: ' + lng);

                                        // Set the retrieved latitude and longitude into the form fields
                                        document.getElementById("lat").value = lat;
                                        document.getElementById("lng").value = lng;
                                    }, function(error) {
                                        // Log error message and show alert
                                        console.error('Error getting location: ', error);
                                        alert("Error getting location: " + error.message);
                                    });
                                } else {
                                    alert("Geolocation is not supported by this browser.");
                                }
                            }

                            window.onload = function() {
                                // Call the geolocation function on page load
                                getDeviceLocation();
                            };
                        </script>



                        <script>
                            function getLocation() {
                                if (navigator.geolocation) {
                                    console.log("Geolocation API is available.");
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                        var lat = position.coords.latitude;
                                        var lng = position.coords.longitude;

                                        console.log("Latitude: " + lat);
                                        console.log("Longitude: " + lng);

                                        // Update the HTML with the retrieved coordinates
                                        document.getElementById("lat").value = lat;
                                        document.getElementById("lng").value = lng;
                                    }, function(error) {
                                        console.error("Error occurred: " + error.message);
                                        alert("Error occurred: " + error.message);
                                    });
                                } else {
                                    alert("Geolocation is not supported by this browser.");
                                }
                            }
                        </script>

                    </div>


                </div>



            </div>



@endsection

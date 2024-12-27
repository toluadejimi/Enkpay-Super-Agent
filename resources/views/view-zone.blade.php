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
                                <h4 class="fw-semibold mb-8">Geo Fence Information</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-muted text-decoration-none" href="home">Home</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Manage Geo-Fence</li>
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


                <div class="card mt-4">
                    <div class="card-body">

                        <h5 class="mb-3">Edit Geolocation</h5>

                        <label> Zone Name </label>
                        <input name="zone_name" id="zone_name" class="form-control my-4" value="{{ $zone->zone_name }}">

                        <input
                            id="pac-input"
                            class="controls"
                            type="text"
                            placeholder="Search Box"
                            style="margin-top: 10px; width: 400px;"
                        />

                        <button id="update-coordinates" class="btn btn-primary" style="margin: 10px;">Update Geofence</button>
                        <div id="map" style="height: 500px;"></div>

                    </div>

                    <script
                        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=drawing,places&callback=initMap"
                        async
                        defer>
                    </script>

                    <script>
                        let map;
                        let drawingManager;
                        let currentPolygon = null;
                        let latLngs = @json($coordinates); // Inject saved coordinates from the server

                        function initMap() {
                            const center = { lat: 6.5244, lng: 3.3792 }; // Default center

                            map = new google.maps.Map(document.getElementById('map'), {
                                center: center,
                                zoom: 12
                            });

                            // Initialize SearchBox
                            const input = document.getElementById("pac-input");
                            const searchBox = new google.maps.places.SearchBox(input);
                            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

                            map.addListener("bounds_changed", () => {
                                searchBox.setBounds(map.getBounds());
                            });

                            let markers = [];
                            searchBox.addListener("places_changed", () => {
                                const places = searchBox.getPlaces();

                                if (places.length === 0) {
                                    alert("No places found.");
                                    return;
                                }

                                markers.forEach(marker => marker.setMap(null));
                                markers = [];

                                const bounds = new google.maps.LatLngBounds();
                                places.forEach(place => {
                                    if (!place.geometry || !place.geometry.location) {
                                        console.error("Returned place contains no geometry");
                                        return;
                                    }

                                    const marker = new google.maps.Marker({
                                        map: map,
                                        title: place.name,
                                        position: place.geometry.location,
                                    });
                                    markers.push(marker);

                                    if (place.geometry.viewport) {
                                        bounds.union(place.geometry.viewport);
                                    } else {
                                        bounds.extend(place.geometry.location);
                                    }
                                });
                                map.fitBounds(bounds);
                            });

                            // DrawingManager for polygons
                            drawingManager = new google.maps.drawing.DrawingManager({
                                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                                drawingControl: true,
                                polygonOptions: {
                                    fillColor: '#FF0000',
                                    fillOpacity: 0.3,
                                    strokeWeight: 2,
                                    editable: true,
                                    zIndex: 1
                                }
                            });
                            drawingManager.setMap(map);

                            // Preload saved polygon
                            if (latLngs.length > 0) {
                                const bounds = new google.maps.LatLngBounds();
                                const path = latLngs.map(coord => {
                                    const latLng = new google.maps.LatLng(coord.lat, coord.lng);
                                    bounds.extend(latLng);
                                    return latLng;
                                });

                                currentPolygon = new google.maps.Polygon({
                                    paths: path,
                                    fillColor: '#FF0000',
                                    fillOpacity: 0.3,
                                    strokeWeight: 2,
                                    editable: true,
                                    draggable: true
                                });
                                currentPolygon.setMap(map);
                                map.fitBounds(bounds);
                            }

                            google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
                                if (currentPolygon) {
                                    currentPolygon.setMap(null);
                                }

                                currentPolygon = polygon;
                                const vertices = polygon.getPath().getArray();
                                latLngs = vertices.map(vertex => ({
                                    lat: vertex.lat(),
                                    lng: vertex.lng()
                                }));
                            });

                            document.getElementById('update-coordinates').addEventListener('click', function () {
                                if (latLngs.length === 0) {
                                    alert("Please draw a polygon on the map first!");
                                    return;
                                }

                                const zone_id = {{ $zone->id }};
                                const zoneName = document.getElementById('zone_name').value;

                                if (!zoneName.trim()) {
                                    alert("Zone Name cannot be empty!");
                                    return;
                                }

                                const requestData = {
                                    latLngs: latLngs,
                                    zone_id: zone_id,
                                    zoneName: zoneName,
                                };

                                fetch('/update-geofence', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify(requestData)
                                })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log('Geofence updated:', data);
                                        alert('Geofence updated successfully!');
                                    })
                                    .catch(error => {
                                        console.error('Error saving geofence:', error);
                                        alert('Failed to save geofence.');
                                    });
                            });
                        }

                        window.initMap = initMap;
                    </script>
                </div>



            </div>







@endsection

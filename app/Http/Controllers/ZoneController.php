<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoneController extends Controller
{
    public function index()
    {
        $data['zone'] = Zone::where('user_id', Auth::id())->get();

        return view('zone', $data);


    }

    public function view_zone(request $request)
    {

        $data['zone'] = Zone::where('id', $request->id)->first();
        $data['coordinates'] = [
            [
                'lat' => $data['zone']->lat_1,
                'lng' => $data['zone']->lng_1,
            ],
            [
                'lat' => $data['zone']->lat_2,
                'lng' => $data['zone']->lng_2,
            ],
            [
                'lat' => $data['zone']->lat_3,
                'lng' => $data['zone']->lng_3,
            ],
            [
                'lat' => $data['zone']->lat_4,
                'lng' => $data['zone']->lng_4,
            ]
        ];

        return view('view-zone', $data);

    }


    public function store(Request $request)
    {
        $data = $request->all();
        $zone = new Zone();
        $zone->zone_name = $data['zoneName'];
        $zone->lat_1 = $data['latLngs'][0]['lat'] ?? 0;
        $zone->lng_1 = $data['latLngs'][0]['lng'] ?? 0;
        $zone->lat_2 = $data['latLngs'][1]['lat'] ?? 0;
        $zone->lng_2 = $data['latLngs'][1]['lng'] ?? 0;
        $zone->lat_3 = $data['latLngs'][2]['lat'] ?? 0;
        $zone->lng_3 = $data['latLngs'][2]['lng'] ?? 0;
        $zone->lat_4 = $data['latLngs'][3]['lat'] ?? 0;
        $zone->lng_4 = $data['latLngs'][3]['lng'] ?? 0;
        $zone->status = 2;
        $zone->user_id = Auth::id();
        $zone->save();

        if ($zone) {
            return response()->json(['message' => 'Zone Created Successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to update terminal geofence'], 500);
        }

    }


    public function update(Request $request)
    {
        $data = $request->all();
        $updated = Zone::where('id', $data['zone_id'])->update([
            'lat_1' => $data['latLngs'][0]['lat'],
            'lng_1' => $data['latLngs'][0]['lng'],
            'lat_2' => $data['latLngs'][1]['lat'],
            'lng_2' => $data['latLngs'][1]['lng'],
            'lat_3' => $data['latLngs'][2]['lat'],
            'lng_3' => $data['latLngs'][2]['lng'],
            'lat_4' => $data['latLngs'][3]['lat'],
            'lng_4' => $data['latLngs'][3]['lng'],
            'zone_name' => $data['zoneName'],

        ]);


        if ($updated) {
            return response()->json(['message' => 'Zone has been successfully edite'], 200);
        } else {
            return response()->json(['message' => 'Failed to update terminal geofence'], 500);
        }

    }


    public function add_new_zone(Request $request)
    {

        $data['zone'] = Zone::where('id', $request->id)->first();
        $data['coordinates'] = [
            [
                'lat' => $data['zone']->lat_1 ?? 6.5244,
                'lng' => $data['zone']->lng_1 ?? 3.3792,
            ],
            [
                'lat' => $data['zone']->lat_2 ?? 0,
                'lng' => $data['zone']->lng_2 ?? 0,
            ],
            [
                'lat' => $data['zone']->lat_3 ?? 0,
                'lng' => $data['zone']->lng_3 ?? 0,
            ],
            [
                'lat' => $data['zone']->lat_4 ?? 0,
                'lng' => $data['zone']->lng_4 ?? 0,
            ]
        ];

        return view('new-zone', $data);
    }


    public function test_geofence(Request $request)
    {

        $deviceLat = $request->lat;
        $deviceLng = $request->lng;


        $zone_id = Terminal::where('serial_no', $request->serial_no)->first()->geo_fence_id;
        $data['zone'] = Zone::where('id', $zone_id)->first();

        $geofenceCoordinates = [
            [
                'lat' => $data['zone']->lat_1 ?? 0,
                'lng' => $data['zone']->lng_1 ?? 0,
            ],
            [
                'lat' => $data['zone']->lat_2 ?? 0,
                'lng' => $data['zone']->lng_2 ?? 0,
            ],
            [
                'lat' => $data['zone']->lat_3 ?? 0,
                'lng' => $data['zone']->lng_3 ?? 0,
            ],
            [
                'lat' => $data['zone']->lat_4 ?? 0,
                'lng' => $data['zone']->lng_4 ?? 0,
            ]
        ];




        $isInside = $this->isLocationInsideGeofence($deviceLat, $deviceLng, $geofenceCoordinates);

        return response()->json(['inside' => $isInside]);
    }


    private function isLocationInsideGeofence($lat, $lng, $geofenceCoordinates)
    {
        $polygon = [];
        foreach ($geofenceCoordinates as $coordinate) {
            $polygon[] = [$coordinate['lat'], $coordinate['lng']];
        }
        return $this->pointInPolygon($lat, $lng, $polygon);
    }


    private function pointInPolygon($lat, $lng, $polygon)
    {
        $inside = false;
        $n = count($polygon);
        $x = $lat;
        $y = $lng;
        $p1x = $polygon[0][0];
        $p1y = $polygon[0][1];
        for ($i = 1; $i <= $n; $i++) {
            $p2x = $polygon[$i % $n][0];
            $p2y = $polygon[$i % $n][1];
            if ($y > min($p1y, $p2y)) {
                if ($y <= max($p1y, $p2y)) {
                    if ($x <= max($p1x, $p2x)) {
                        if ($p1y != $p2y) {
                            $xinters = ($y - $p1y) * ($p2x - $p1x) / ($p2y - $p1y) + $p1x;
                        }
                        if ($p1x == $p2x || $x <= $xinters) {
                            $inside = !$inside;
                        }
                    }
                }
            }
            $p1x = $p2x;
            $p1y = $p2y;
        }
        return $inside;
    }


}

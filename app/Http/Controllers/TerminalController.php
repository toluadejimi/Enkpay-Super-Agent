<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerminalController extends Controller
{
    public function view_terminal(request $request)
    {

        $data['ter'] = Terminal::where('id', $request->t_id)->first();
        $data['zones'] = Zone::where('user_id', Auth::id())->get();

        return view('terminal', $data);


    }

    public function set_geofence(Request $request)
    {


        $geo = Terminal::where('serial_no', $request->serial_no)->update(
            [
                'geo_fence_id' => $request->zone_id
            ]

        );

        return back()->with('message', "Zone has been updated for geofence");




    }





}

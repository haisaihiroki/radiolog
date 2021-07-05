<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommunicationLog;
use App\Mode;
use App\Readability;
use App\SignalStrength;
use App\Tone;


class SummaryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        #band 1.8MHz-1.9MHz
        $band_160 = $user->communicationLogs()->where('band', 'regexp', '^1\.[89]\d*')->get();
        #band 3.5MHz-3.8MHz
        $band_80 = $user->communicationLogs()->where('band', 'regexp','^3\.[5678]\d*')->get();
        #band 7.0MHz-7.3MHz
        $band_40 = $user->communicationLogs()->where('band', 'regexp','^7\.[012]\d*')->get();
        #band[10.100, 10.150]
        $band_30 = $user->communicationLogs()->where('band', 'regexp','10\.1[01234]\d*')->get();
        #band[14.000, 14.350]
        $band_20 = $user->communicationLogs()->where('band', 'regexp','14\.[123]\d*')->get();
        #band[18.068, 18.168]
        $band_17 = $user->communicationLogs()->where('band', 'regexp','18\.[01]\d*')->get();
        #band[21.000, 21.450]
        $band_15 = $user->communicationLogs()->where('band', 'regexp','21\.[01234]\d*')->get();
        #band[24.890, 24.990]
        $band_12 = $user->communicationLogs()->where('band', 'regexp','24\.[89]\d*')->get();
        #band[28.000, 29.700]
        $band_10 = $user->communicationLogs()->where('band', 'regexp','2[89]\.\d*')->get();
        #band[50.000, 54.000]
        $band_6 = $user->communicationLogs()->where('band', 'regexp','5[0123]\.\d*')->get();
        #band[144.000, 146.000]
        $band_2 = $user->communicationLogs()->where('band', 'regexp','14[45]\.\d*')->get();
        #band[430.000, 440.000]
        $band_430 = $user->communicationLogs()->where('band', 'regexp','43\d\.\d*')->get();
        #band[1260.000, 1300.000]
        $band_1200 = $user->communicationLogs()->where('band', 'regexp','12[6789]\d\.\d*')->get();

        return view('summary', compact('band_160', 'band_80', 'band_40', 'band_30', 'band_20', 'band_17', 'band_15', 'band_12', 'band_10', 'band_6', 'band_2', 'band_430', 'band_1200'));
    }
}
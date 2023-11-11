<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommunicationLog;
use App\Mode;
use App\Readability;
use App\SignalStrength;
use App\Tone;
use App\Band;


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
        
        $summary = array();
        $bands = Band::all();
        foreach ($bands as $band)
        {
            $tmp = $user->communicationLogs()->where('band_id', $band->id)->get();
            array_push($summary, $tmp);
        }

        $total = $user->communicationLogs()->get();
        $mode_analogs = Mode::getAnalogList();
        $mode_digitals = Mode::getDigitalList();

        return view('summary', compact('bands', 'summary', 'total', 'mode_analogs', 'mode_digitals'));
    }

}
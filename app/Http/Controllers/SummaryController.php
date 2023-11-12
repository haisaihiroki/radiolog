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
        $validatedData = $request->validate([
            'period' => 'numeric|max:3000|min:1800',
        ]);

        $user = Auth::user();
        $subject = "Total";
        $period = $request->query('period', '-1');
        
        if ($period != -1)
        {
            $subject = $period . "year";
        }

        $summary = array();
        $bands = Band::all();
        foreach ($bands as $band)
        {
            if ($period != -1)
            {
                $tmp = $user->communicationLogs()->where('band_id', $band->id)->whereBetween('time', [$period . '-01-01 00:00:00', $period . '-12-31 23:59:59'])->get();
            }
            else
            {
                $tmp = $user->communicationLogs()->where('band_id', $band->id)->get();
            }
            array_push($summary, $tmp);
        }

        $total = $user->communicationLogs()->get();
        $mode_analogs = Mode::getAnalogList();
        $mode_digitals = Mode::getDigitalList();

        return view('summary', compact('subject', 'bands', 'summary', 'total', 'mode_analogs', 'mode_digitals'));
    }

}
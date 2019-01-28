<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommunicationLog;
use Illuminate\Support\Str;


class HomeController extends Controller
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
    public function index()
    {
        $user = Auth::user();
        $logs = $user->communicationLogs()->orderBy('created_at', 'desc')->take(50)->get();
        return view('home', compact('logs'));
    }

    public function createLog()
    {
        return view('createLog');
    }

    public function saveCreateLog(Request $request)
    {
        $validatedData = $request->validate([
            'HisCallSign' => 'required|max:255|alpha_num',
            'HisName' => 'max:255',
            'Date' => 'required|date',
            'Time' => 'required',
            'Band' => 'required|numeric',
            'Mode' => 'required|exists:modes,id',
            'MyQTH' => 'nullable|max:255',
            'HisQTH' => 'nullable|max:255',
            'MyR' => 'required|exists:readabilities,readability',
            'MyS' => 'required|exists:signal_strengths,strength',
            'MyT' => 'nullable|exists:tones,tone',
            'HisR' => 'required|exists:readabilities,readability',
            'HisS' => 'required|exists:signal_strengths,strength',
            'HisT' => 'nullable|exists:tones,tone',
            'MyPower' => 'nullable|numeric',
            'HisPower' => 'nullable|numeric',
            'Note' => 'nullable',
        ]);

        $recode = new CommunicationLog();
        $recode->his_callsign = strtoupper($request->HisCallSign);
        $recode->his_name = $request->HisName;
        $formant = "Y-m-d H:i";
        $recode->time = \DateTime::createFromFormat($formant, $request->Date . " " . $request->Time);
        $recode->band = $request->Band;
        $recode->mode_id = $request->Mode;
        $recode->my_qth = $request->MyQTH;
        $recode->his_qth = $request->HisQTH;
        $recode->my_r = $request->MyR;
        $recode->my_s = $request->MyS;
        if ($request->MyT != "")
        {
            $recode->my_t = $request->MyT;
        }
        $recode->his_r = $request->HisR;
        $recode->his_s = $request->HisS;
        if ($request->HisT != "")
        {
            $recode->his_t = $request->HisT;
        }
        $recode->my_power = $request->MyPower;
        $recode->his_power = $request->HisPower;
        $recode->is_public = false;
        $recode->uuid = Str::uuid();
        $recode->note = $request->Note;

        $user = Auth::user();
        $user->communicationLogs()->save($recode);

        return redirect(route('home'));

    }
}

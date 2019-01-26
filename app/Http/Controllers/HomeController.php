<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
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
            'Mode' => 'required',
            'MyQTH' => 'max:255',
            'HisQTH' => 'max:255',
            'MyR' => 'required|digits_between:1,5',
            'MyS' => 'required|digits_between:1,9',
            'MyT' => '',
            'HisR' => 'required|digits_between:1,5',
            'HisS' => 'required|digits_between:1,9',
            'HisT' => '',
            'MyPower' => 'numeric',
            'HisPower' => 'numeric',
        ]);

        $recode = new CommunicationLog();
        $recode->his_callsign = $request->HisCallSign;
        $recode->his_name = $request->HisName;
        $recode->time = DateTime::dateTime($request->Date . " " . $request->Time);
        $recode->band = $request->Band;
        $recode->mode_id = $request->Mode;
        $recode->my_qth = $request->MyQTH;
        $recode->his_qth = $request->HisQTH;
        $recode->my_r = $request->MyR;
        $recode->my_s = $request->MyS;
        //$recode->my_t = $request->MyT;
        $recode->his_r = $request->HisR;
        $recode->his_s = $request->HisS;
        //$recode->his_t = $request->HisT;
        $recode->my_power = $request->MyPower;
        $recode->his_power = $request->HisPower;
        $recode->is_public = false;
        $recode->uuid = Str::uuid();

        $user = Auth::user();
        $user->communicationLogs()->save($recode);

        return redirect(route('home'));

    }
}

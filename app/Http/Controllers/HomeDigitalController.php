<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\CommunicationLog;
use App\Mode;

class HomeDigitalController extends Controller
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
        $hisCallSign = "";
        if (isset($request->HisCallSign))
        {
            $hisCallSign = strtoupper($request->HisCallSign);
            $modeIDs = Mode::getDigitalListID();
            $logs = $user->communicationLogs()->where('his_callsign', $hisCallSign)->whereIn('mode_id', $modeIDs)->orderBy('created_at', 'desc')->paginate(5);
            $log_latest = $user->communicationLogs()->where('his_callsign', $hisCallSign)->whereIn('mode_id', $modeIDs)->orderBy('created_at', 'desc')->first();
            $count = $logs->total() - $logs->perPage() * ($logs->currentPage() - 1);
            $modes = Mode::getDigitalList();
            if (!isset($log_latest))
            {
                $log_latest = new CommunicationLog();
                $log_latest->his_callsign = $hisCallSign;
            }

            return view('digital/searchAndCreateLog', compact('logs', 'count', 'hisCallSign', 'log_latest', 'modes'));
        }
        else
        {
            $modeIDs = Mode::getDigitalListID();
            $logs = $user->communicationLogs()->whereIn('mode_id', $modeIDs)->orderBy('created_at', 'desc')->paginate(20);
        }

        $count = $logs->total() - $logs->perPage() * ($logs->currentPage() - 1);

        return view('digital/home', compact('logs', 'count', 'hisCallSign'));
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
            'MySDigital' => 'required|numeric',
            'HisSDigital' => 'required|numeric',
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
        $recode->my_s_digital = $request->MySDigital;
        $recode->his_s_digital = $request->HisSDigital;
        $recode->my_power = $request->MyPower;
        $recode->his_power = $request->HisPower;
        $recode->is_public = false;
        $recode->uuid = $this->makeUUID();
        $recode->note = $request->Note;

        $user = Auth::user();
        $user->communicationLogs()->save($recode);

        return redirect(route('home-digital'));

    }

    public function saveCommunicationLog(Request $request)
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
            'MySDigital' => 'required|numeric',
            'HisSDigital' => 'required|numeric',
            'MyPower' => 'nullable|numeric',
            'HisPower' => 'nullable|numeric',
            'Note' => 'nullable',
        ]);

        $user = Auth::user();
        $log = $user->communicationLogs()->where('uuid', $request->uuid)->firstOrFail();

        $log->his_callsign = strtoupper($request->HisCallSign);
        $log->his_name = $request->HisName;
        $formant = "Y-m-d H:i";
        $log->time = \DateTime::createFromFormat($formant, $request->Date . " " . $request->Time);
        $log->band = $request->Band;
        $log->mode_id = $request->Mode;
        $log->my_qth = $request->MyQTH;
        $log->his_qth = $request->HisQTH;
        $log->my_s_digital = $request->MySDigital;
        $log->his_s_digital = $request->HisSDigital;
        $log->my_power = $request->MyPower;
        $log->his_power = $request->HisPower;
        $log->is_public = false;
        $log->note = $request->Note;

        $log->save();

        return redirect(route('home-digital'));
    }

    public function editCommunicationLog($uuid)
    {
        $user = Auth::user();
        $log = $user->communicationLogs()->where('uuid', $uuid)->firstOrFail();
        $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $log->time);
        $modes = Mode::getDigitalList();

        return view('digital/editLog', compact('log', 'uuid', 'dateTime', 'modes'));
    }

    private function makeUUID()
    {
        $uuid = Str::uuid();
        $check = DB::table('communication_logs')->where('uuid', $uuid)->count();

        if ($check == 0)
        {
            return $uuid;
        }
        else
        {
            return $this->makeUUID();
        }
    }

    public function viewCommunicationLog($uuid)
    {
        $user = Auth::user();
        $log = $user->communicationLogs()->where('uuid', $uuid)->firstOrFail();

        return view('digital/viewLog', compact('log', 'uuid'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommunicationLog;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        $user = Auth::user();
        $hisCallSign = "";
        if (isset($request->HisCallSign))
        {
            $hisCallSign = strtoupper($request->HisCallSign);
            $logs = $user->communicationLogs()->where('his_callsign', $hisCallSign)->orderBy('created_at', 'desc')->paginate(5);
            $log_latest = $user->communicationLogs()->where('his_callsign', $hisCallSign)->orderBy('created_at', 'desc')->first();
            $count = $logs->total() - $logs->perPage() * ($logs->currentPage() - 1);
            if (!isset($log_latest))
            {
                $log_latest = new CommunicationLog();
            }

            return view('searchAndCreateLog', compact('logs', 'count', 'hisCallSign', 'log_latest'));
        }
        else
        {
            $logs = $user->communicationLogs()->orderBy('created_at', 'desc')->paginate(20);
        }

        $count = $logs->total() - $logs->perPage() * ($logs->currentPage() - 1);

        return view('home', compact('logs', 'count', 'hisCallSign'));
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
        $recode->uuid = $this->makeUUID();
        $recode->note = $request->Note;

        $user = Auth::user();
        $user->communicationLogs()->save($recode);

        return redirect(route('home'));

    }
    public function editCommunicationLog($uuid)
    {
        $user = Auth::user();
        $log = $user->communicationLogs()->where('uuid', $uuid)->firstOrFail();
        $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $log->time);

        return view('editLog', compact('log', 'uuid', 'dateTime'));
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
        $log->my_r = $request->MyR;
        $log->my_s = $request->MyS;
        if ($request->MyT != "")
        {
            $log->my_t = $request->MyT;
        }
        $log->his_r = $request->HisR;
        $log->his_s = $request->HisS;
        if ($request->HisT != "")
        {
            $log->his_t = $request->HisT;
        }
        $log->my_power = $request->MyPower;
        $log->his_power = $request->HisPower;
        $log->is_public = false;
        $log->note = $request->Note;

        $log->save();

        return redirect(route('home'));
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

        return view('viewLog', compact('log', 'uuid'));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateTimeZone;

class CommunicationLog extends Model
{
    protected $fillable = [
        'his_callsign', 'his_name', 'time', 'my_qth', 'his_qth', 'band', 'is_public', 'uuid', 'my_power', 'his_power'
    ];

    protected $casts = [
        'band' => 'decimal:3',
    ];

    public  function user()
    {
        return $this->belongsTo('App\User');
    }

    public function my_Readability()
    {
        return $this->belongsTo('App\Readability', 'my_r', 'readability');
    }

    public function his_Readability()
    {
        return $this->belongsTo('App\Readability', 'his_r', 'readability');
    }

    public function my_SignalStrength()
    {
        return $this->belongsTo('App\SignalStrength', 'my_s', 'strength');
    }

    public function his_SignalStrength()
    {
        return $this->belongsTo('App\SignalStrength', 'his_s', 'strength');
    }

    public function my_Tone()
    {
        return $this->belongsTo('App\Tone', 'my_t', 'tone');
    }

    public function his_Tone()
    {
        return $this->belongsTo('App\Tone', 'his_t', 'tone');
    }

    public function mode()
    {
        return $this->belongsTo('App\Mode', 'mode_id', 'id');
    }

    public function my_RST()
    {
        $rs = $this->my_Readability()->first()->readability . $this->my_SignalStrength()->first()->strength;

        if ( $this->my_Tone()->first() == NULL)
        {
            return $rs;
        }
        else {
            return $rs . $this->my_Tone()->first()->tone;
        }
    }

    public function his_RST()
    {
        $rs = $this->his_Readability()->first()->readability . $this->his_SignalStrength()->first()->strength;

        if ( $this->his_Tone()->first() == NULL)
        {
            return $rs;
        }
        else {
            return $rs . $this->his_Tone()->first()->tone;
        }
    }

    public function time_utc()
    {
        $t = new DateTime($this->time);
        $t->setTimeZone( new DateTimeZone('UTC'));
        return $t->format("Y-m-d H:i:s");
    }
}

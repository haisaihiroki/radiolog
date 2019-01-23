<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationLog extends Model
{
    public  function user()
    {
        return $this->belongsTo('App\User');
    }

    public function modes()
    {
        return $this->hasOne('App\Mode');
    }

    public function my_Readability()
    {
        return $this->hasOne('App\Readability', 'id', 'my_r');
    }

    public function his_Readability()
    {
        return $this->hasOne('App\Readability', 'id', 'his_r');
    }

    public function my_SignalStrength()
    {
        return $this->hasOne('App\SignalStrength', 'id', 'my_s');
    }

    public function his_SignalStrength()
    {
        return $this->hasOne('App\SignalStrength', 'id', 'his_s');
    }

    public function my_Tone()
    {
        return $this->hasOne('App\Tone', 'id', 'my_t');
    }

    public function his_Tone()
    {
        return $this->hasOne('App\Tone', 'id', 'his_t');
    }
}

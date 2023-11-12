<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = ['band', 'lower_freq', 'upper_freq']; 

    public static function getBandId($freq)
    {
        $bands = Band::all();

        foreach($bands as $val)
        {
            if ($val->lowwer_freq < $freq && $freq < $val->upper_freq)
            {
                return $val->id;
            }
        }
        return NULL;
    }
}

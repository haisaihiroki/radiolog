<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    public function getBand($freq)
    {
        $bands = Band::all();

        foreach($bands as $val)
        {
            if ($val->lowwer_freq < $freq && $freq < $val->upper_freq)
            {
                return $val->band;
            }
        }
        return NULL;
    }
}

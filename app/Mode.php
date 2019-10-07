<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $fillable = ['name', 'is_digital'];

    public static function getAnalogList()
    {
        return Mode::where('is_digital', false)->orderBy('created_at', 'asc')->get();
    }

    public static function getDigitalList()
    {
        return Mode::where('is_digital', true)->orderBy('created_at', 'asc')->get();
    }

    public static function getAnalogListID()
    {
        return Mode::where('is_digital', false)->pluck('id');
    }

    public static function getDigitalListID()
    {
        return Mode::where('is_digital', true)->pluck('id');
    }
}

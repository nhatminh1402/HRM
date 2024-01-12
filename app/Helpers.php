<?php

namespace App;

use Illuminate\Support\Facades\Hash;

class Helpers
{
    public static function generateEmployeeCode($prefix)
    {
        $timestamp = time();
        $hashedTimestamp = Hash::make($timestamp);
        $cleanedTimestamp = preg_replace('/[^0-9]/', '', $hashedTimestamp);
        $cleanedTimestamp = substr($cleanedTimestamp, -10); 

        return $prefix . $cleanedTimestamp;
    }


}

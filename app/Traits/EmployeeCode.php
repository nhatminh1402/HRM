<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait EmployeeCode
{

    public function generateEmployeeCode($prefix)
    {
        $timestamp = time();
        $hashedTimestamp = Hash::make($timestamp);
        $cleanedTimestamp = preg_replace('/[^A-Za-z0-9]/', '', $hashedTimestamp);
        $uniqueId = substr($cleanedTimestamp, 0, 10);
        return $prefix . $uniqueId;
    }
}

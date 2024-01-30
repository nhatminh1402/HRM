<?php

namespace App\Services\Authentication;

use Auth;
use Session;

class LoginService
{
    public function setAvatarCharacterNameOfAdmin()
    {
        $fullName = Auth::user()->name;
        $index = strlen($fullName) - 1;
        $characterName = $fullName[$index];

        while ($index > -1 && $fullName[$index] != " ") {
            $characterName = $fullName[$index];
            $index--;
        }

        Session::put('characterName', $characterName);
    }
}
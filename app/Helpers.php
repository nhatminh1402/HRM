<?php

namespace App;

use Auth;
use Ramsey\Uuid\Uuid;
use Session;

class Helpers
{
    public static function generateCode($prefix)
    {
        $uuid = Uuid::uuid4()->toString();
        $cleanedUuid = preg_replace('/[^0-9]/', '', $uuid);
        $cleanedUuid = substr($cleanedUuid, -10);
        return $prefix . $cleanedUuid;
    }

    public static function stripHtmlTags($data)
    {
        if (isset($data['description'])) {
            $data['description'] = strip_tags($data['description']);
        }
        return $data;
    }

    public static function setAvatarCharacterNameOfAdmin()
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

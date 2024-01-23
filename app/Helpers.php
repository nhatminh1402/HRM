<?php

namespace App;

use Ramsey\Uuid\Uuid;

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
}

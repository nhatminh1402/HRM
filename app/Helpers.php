<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class Helpers
{
    public static function generateEmployeeCode($prefix)
    {
        $uuid = Uuid::uuid4()->toString();
        $cleanedUuid = preg_replace('/[^0-9]/', '', $uuid);
        $cleanedUuid = substr($cleanedUuid, -10);
        return $prefix . $cleanedUuid;
    }

    public static function stripHtmlTags($data)
    {
        if (isset($data['description'])) {
            $data['description'] = preg_replace('/<p[^>]*>/', '', $data['description']);
            $data['description'] = preg_replace('/<\/p>/', '', $data['description']);
        }
        return $data;
    }
}

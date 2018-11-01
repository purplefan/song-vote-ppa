<?php

namespace App\External;

class ExternalSongRepository
{
    private static $songs = [
        1 => "Deep Purple - Smoke on the water",
        2 => "Joe Bonamassa - Sloe Gin",
        3 => "Gov't Mule - Mule",
    ];

    public static function getAllSongs(): array
    {
        return self::$songs;
    }

    public static function getSongById(int $id): ?string
    {
        if (!array_key_exists($id, self::$songs)) {
            return null;
        }

        return self::$songs[$id];
    }
}
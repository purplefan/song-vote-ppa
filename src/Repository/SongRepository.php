<?php

namespace App\Repository;

use App\Domain\Entity\Song;
use App\Domain\Repository\SongRepositoryInterface;
use App\External\ExternalSongRepository;

class SongRepository implements SongRepositoryInterface
{

    public function findSong(int $id): Song
    {
        return new Song($id, ExternalSongRepository::getSongById($id));
    }
}
<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Song;

interface SongRepositoryInterface
{
    public function findSong(int $id): ?Song;
}
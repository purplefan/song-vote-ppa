<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Song;

interface VoteRepositoryInterface
{
    public function saveVote(Song $song): void;

    public function findSong(int $songId): ?Song;

    public function findAll(): ?array;
}
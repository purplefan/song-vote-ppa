<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Song;

interface VoteRepositoryInterface
{
    public function saveVote(Song $song): void;
}
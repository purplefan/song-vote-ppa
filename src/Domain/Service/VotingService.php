<?php

namespace App\Domain\Service;

use App\Domain\Repository\SongRepositoryInterface;
use App\Domain\Repository\VoteRepositoryInterface;

class VotingService
{
    /**
     * @var SongRepositoryInterface
     */
    private $songRepository;

    /**
     * @var VoteRepositoryInterface
     */
    private $voteRepository;

    /**
     * @param SongRepositoryInterface $songRepository
     * @param VoteRepositoryInterface $voteRepository
     */
    public function __construct(SongRepositoryInterface $songRepository, VoteRepositoryInterface $voteRepository)
    {
        $this->songRepository = $songRepository;
        $this->voteRepository = $voteRepository;
    }


    public function vote(int $id, int $score)
    {
        $song = $this->songRepository->findSong($id);
        $song->vote($score);
        $this->voteRepository->saveVote($song);

        return "success";
    }
}
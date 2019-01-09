<?php

namespace App\Domain\Service;

use App\Domain\Entity\Song;
use App\Domain\Exception\SongNotFoundException;
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

    /**
     * @param int $id
     * @param int $score
     *
     * @return string
     */
    public function vote(int $id, int $score)
    {

        $song = $this->voteRepository->findSong($id);
        if (!$song) {
            $song = $this->songRepository->findSong($id);
        }
        if (!$song) {
            throw new SongNotFoundException();
        }
        $song->vote($score);
        $this->voteRepository->saveVote($song);

        return "success";
    }

    public function getVotes()
    {
        return array_map(function (Song $song) {
            return [
                'song_id' => $song->songId(),
                'details' => $song->songDetails(),
                'score' => $song->score(),
            ];
        },
            $this->voteRepository->findAll()
        );
    }
}
<?php

namespace App\Controller;

use App\Domain\Service\VotingService;
use App\External\ExternalSongRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class VoteController
{
    /**
     * @var VotingService $votingService
     */
    private $votingService;

    /**
     * @param VotingService $votingService
     */
    public function __construct(VotingService $votingService)
    {
        $this->votingService = $votingService;
    }

    /**
     * @Route("/songs/list")
     *
     * @return JsonResponse
     */
    public function listSongs()
    {
        return new JsonResponse(ExternalSongRepository::getAllSongs());
    }

    /**
     * @Route("/vote/{songId}/{score}")
     *
     * @param int $songId
     * @param int $score
     *
     * @return JsonResponse
     */
    public function voteSong(int $songId, int $score)
    {
        return new JsonResponse($this->votingService->vote($songId, $score));
    }

    /**
     * @Route("/votes/list")
     *
     * @return JsonResponse
     */
    public function listVotes()
    {
        return new JsonResponse($this->votingService->getVotes());
    }
}
<?php

namespace App\Controller;

use App\Domain\Service\VotingService;
use App\External\ExternalSongRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class VoteController
{
    /**
     * @Route("/list")
     *
     * @return JsonResponse
     */
    public function listSongs()
    {
        return new JsonResponse(ExternalSongRepository::getAllSongs());
    }

    /**
     * @Route("/vote")
     *
     * @param VotingService $votingService
     */
    public function voteSong(VotingService $votingService)
    {
        return new JsonResponse($votingService->vote(1,10));
    }
}
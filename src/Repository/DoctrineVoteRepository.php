<?php

namespace App\Repository;

use App\Domain\Entity\Song;
use App\Domain\Repository\VoteRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineVoteRepository implements VoteRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function saveVote(Song $song): void
    {
        $this->entityManager->persist($song);
        $this->entityManager->flush();
    }
}
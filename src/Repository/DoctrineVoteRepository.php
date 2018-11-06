<?php

namespace App\Repository;

use App\Domain\Entity\Song;
use App\Domain\Repository\VoteRepositoryInterface;
use Doctrine\ORM\EntityManager;

class DoctrineVoteRepository implements VoteRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * DoctrineWarehouseRepository constructor.
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function saveVote(Song $song): void
    {
        $this->entityManager->persist($song);
        $this->entityManager->flush();
    }
}
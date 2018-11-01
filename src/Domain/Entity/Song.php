<?php

namespace App\Domain\Entity;

use App\Domain\Exception\ScoreOutOfBoundsException;

class Song
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var float|null
     */
    private $score;

    /**
     * @var string
     */
    private $songDetails;

    /**
     * @param string $songDetails
     */
    public function __construct(string $songDetails)
    {
        $this->songDetails = $songDetails;
    }

    public function score(): ?float
    {
        return $this->score;
    }

    public function songDetails(): string
    {
        return $this->songDetails;
    }

    public function vote(int $score)
    {
        if ($score < 1 || $score > 10) {
            throw new ScoreOutOfBoundsException();
        }
        if (is_null($this->score)) {
            $this->score = $score;
        } else {
            $this->score = ($this->score + $score) / 2;
        }
    }
}
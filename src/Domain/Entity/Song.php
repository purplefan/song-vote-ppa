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
     * @var array
     */
    private $songDetails;

    /**
     * Song constructor.
     */
    public function __construct($songDetails)
    {
        $this->songDetails = $songDetails;
    }

    public function score(): ?float
    {
        return $this->score;
    }

    public function songDetails()
    {
        return $this->songDetails;
    }

    public function vote(float $score)
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
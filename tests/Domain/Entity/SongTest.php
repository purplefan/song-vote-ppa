<?php

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\Song;
use App\Domain\Exception\ScoreOutOfBoundsException;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    public function testNewSongHasNoScore()
    {
        $song = new Song([]);
        $this->assertNull($song->score());
    }

    public function testVoteForANewSong()
    {
        $song = new Song([]);
        $song->vote(5);
        $this->assertEquals(5, $song->score());
    }

    public function testVoteForTheSongWithScore()
    {
        $song = new Song([]);
        $song->vote(2);
        $song->vote(4);
        $this->assertEquals(3, $song->score());
    }

    public function testIfVoteIsOverTenThrowsException()
    {
        $this->expectException(ScoreOutOfBoundsException::class);
        $song = new Song([]);
        $song->vote(11);
    }

    public function testIfVoteIsUnder1ThrowsException()
    {
        $this->expectException(ScoreOutOfBoundsException::class);
        $song = new Song([]);
        $song->vote(0);
    }

}

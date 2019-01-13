<?php

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\Song;
use App\Domain\Exception\ScoreOutOfBoundsException;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    public function testNewSongHasNoScore()
    {
        $song = new Song(1,"some song");
        $this->assertNull($song->score());
    }

    public function testVoteForANewSong()
    {
        $song = new Song(2,"some song");
        $song->vote(5);
        $this->assertEquals(5, $song->score());
    }

    public function testVoteForTheSongWithScore()
    {
        $song = new Song(3,"some song");
        $song->vote(2);
        $song->vote(3);
        $song->vote(4);
        $this->assertEquals(3, $song->score());
    }

    public function testIfVoteIsOverTenThrowsException()
    {
        $this->expectException(ScoreOutOfBoundsException::class);
        $song = new Song(4,"some song");
        $song->vote(11);
    }

    public function testIfVoteIsUnder1ThrowsException()
    {
        $this->expectException(ScoreOutOfBoundsException::class);
        $song = new Song(4,"some song");
        $song->vote(0);
    }

}

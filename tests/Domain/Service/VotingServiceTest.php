<?php

namespace App\Tests\Domain\Service;

use App\Domain\Entity\Song;
use App\Domain\Exception\SongNotFoundException;
use App\Domain\Repository\SongRepositoryInterface;
use App\Domain\Repository\VoteRepositoryInterface;
use App\Domain\Service\VotingService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class VotingServiceTest extends TestCase
{
    /**
     * @var SongRepositoryInterface|MockObject
     */
    private $songRepository;

    /**
     * @var VoteRepositoryInterface|MockObject
     */
    private $voteRepository;

    /**
     * @var VotingService
     */
    private $votingService;

    public function setUp()
    {
        $this->songRepository = $this->getMockBuilder(SongRepositoryInterface::class)->getMock();
        $this->voteRepository = $this->getMockBuilder(VoteRepositoryInterface::class)->getMock();
        $this->votingService = new VotingService($this->songRepository, $this->voteRepository);
    }

    public function testIfVoteIsStoredAndSongExistsInVoteRepository()
    {
        $id = 1;
        $score = 4;
        $song = new Song(1,"some song");
        $this->voteRepository->expects($this->once())->method('findSong')->with($id)->willReturn($song);
        $this->voteRepository->expects($this->once())
            ->method('saveVote')
            ->with($song);
        $this->assertEquals("success", $this->votingService->vote($id, $score));
    }

    public function testIfVoteIsStoredAndSongNOTExistsInVoteRepository()
    {
        $id = 1;
        $score = 4;
        $song = new Song(1,"some song");
        $this->voteRepository->expects($this->once())->method('findSong')->with($id)->willReturn(null);
        $this->songRepository->expects($this->once())->method('findSong')->with($id)->willReturn($song);
        $this->voteRepository->expects($this->once())
            ->method('saveVote')
            ->with($song);
        $this->assertEquals("success", $this->votingService->vote($id, $score));
    }

    public function testIfSongNOTExitstThrowsException()
    {
        $id = 1;
        $score = 4;
        $this->voteRepository->expects($this->once())->method('findSong')->with($id)->willReturn(null);
        $this->songRepository->expects($this->once())->method('findSong')->with($id)->willReturn(null);
        $this->expectException(SongNotFoundException::class);
        $this->votingService->vote($id, $score);
    }
}

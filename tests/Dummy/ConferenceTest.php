<?php

namespace tests\Krymen\ProphecyExamples\Dummy;

use Krymen\ProphecyExamples\Dummy\Conference;
use Krymen\ProphecyExamples\Dummy\Talk;
use Prophecy\PhpUnit\ProphecyTestCase;

class ConferenceTest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function it_adds_a_talk()
    {
        $conference = new Conference();
        $talk       = $this->prophesize(Talk::class);

        $conference->addTalk($talk->reveal());

        $this->assertEquals(1, $conference->numberOfTalks());
    }
}

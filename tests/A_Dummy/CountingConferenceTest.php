<?php

namespace tests\Krymen\ProphecyExamples\A_Dummy;

use Krymen\ProphecyExamples\A_Dummy\CountingConference;
use Krymen\ProphecyExamples\Talk;
use Prophecy\PhpUnit\ProphecyTestCase;

/**
 * Dummy is a placeholder passed to the SUT, but never used
 * Tested code requires parameter but doesn't need to use it
 */
class CountingConferenceTest extends ProphecyTestCase
{
    /** @test */
    public function it_adds_a_talk()
    {
        $conference = new CountingConference();
        $talk       = $this->prophesize(Talk::class);

        $conference->addTalk($talk->reveal());

        $this->assertEquals(1, $conference->numberOfTalks());
    }
}

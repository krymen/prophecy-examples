<?php

namespace tests\Krymen\ProphecyExamples\A_Dummy;

use Krymen\ProphecyExamples\A_Dummy\ConferenceA;
use Krymen\ProphecyExamples\A_Dummy\TalkA;
use Prophecy\PhpUnit\ProphecyTestCase;

/**
 * Dummy is a placeholder passed to the SUT, but never used
 * Tested code requires parameter but doesn't need to use it
 */
class ConferenceATest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function it_adds_a_talk()
    {
        $conference = new ConferenceA();
        $talk       = $this->prophesize(TalkA::class);

        $conference->addTalk($talk->reveal());

        $this->assertEquals(1, $conference->numberOfTalks());
    }
}

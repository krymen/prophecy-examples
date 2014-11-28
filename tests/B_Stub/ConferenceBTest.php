<?php

namespace tests\Krymen\ProphecyExamples\B_Stub;

use Krymen\ProphecyExamples\B_Stub\ConferenceB;
use Krymen\ProphecyExamples\B_Stub\TalkB;
use Prophecy\PhpUnit\ProphecyTestCase;

/**
 * Stub provides "indirect output" to the tested code
 */
class ConferenceBTest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function it_adds_a_talk()
    {
        $conference = new ConferenceB();

        $talk = $this->prophesize(TalkB::class);
        $talk->name()->willReturn('first_talk');

        $conference->addTalk($talk->reveal());

        $this->assertTrue($conference->has('first_talk'));
    }
}

<?php

namespace tests\Krymen\ProphecyExamples\B_Stub;

use Krymen\ProphecyExamples\B_Stub\ConferenceWithCollection;
use Krymen\ProphecyExamples\Talk;
use Prophecy\PhpUnit\ProphecyTestCase;

/**
 * Stub provides "indirect output" to the tested code
 */
class ConferenceWithCollectionTest extends ProphecyTestCase
{
    /** @test */
    public function it_adds_a_talk()
    {
        $conference = new ConferenceWithCollection();

        $talk = $this->prophesize(Talk::class);
        $talk->name()->willReturn('first_talk');

        $conference->addTalk($talk->reveal());

        $this->assertTrue($conference->has('first_talk'));
    }
}

<?php

namespace tests\Krymen\ProphecyExamples\C_MockAndSpy;

use Krymen\ProphecyExamples\C_MockAndSpy\ConferenceC;
use Krymen\ProphecyExamples\C_MockAndSpy\NotifierC;
use Krymen\ProphecyExamples\C_MockAndSpy\TalkC;
use Prophecy\PhpUnit\ProphecyTestCase;

/**
 * Mock verifies "indirect output" of the tested code
 * Stub verifies "indirect output" by asserting the expectations afterwards
 */
class ConferenceCTest extends ProphecyTestCase
{
    /** @test */
    public function it_notifies_about_adding_a_talk()
    {
        $notifier = $this->prophesize(NotifierC::class);

        $conference = new ConferenceC($notifier->reveal());
        $talk = $this->prophesize(TalkC::class);

        $notifier->notify('A talk has been added')->shouldBeCalled();

        $conference->addTalk($talk->reveal());
    }

    /** @test */
    public function it_notifies_about_adding_a_talk2()
    {
        $notifier = $this->prophesize(NotifierC::class);

        $conference = new ConferenceC($notifier->reveal());
        $talk = $this->prophesize(TalkC::class);

        $conference->addTalk($talk->reveal());

        $notifier->notify('A talk has been added')->shouldHaveBeenCalled();
    }
}

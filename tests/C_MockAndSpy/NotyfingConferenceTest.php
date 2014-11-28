<?php

namespace tests\Krymen\ProphecyExamples\C_MockAndSpy;

use Krymen\ProphecyExamples\C_MockAndSpy\NotifyingConference;
use Krymen\ProphecyExamples\C_MockAndSpy\Notifier;
use Krymen\ProphecyExamples\Talk;
use Prophecy\PhpUnit\ProphecyTestCase;

/**
 * Mock verifies "indirect output" of the tested code
 * Stub verifies "indirect output" by asserting the expectations afterwards
 */
class NotyfingConferenceTest extends ProphecyTestCase
{
    /** @test */
    public function it_notifies_about_adding_a_talk()
    {
        $notifier = $this->prophesize(Notifier::class);

        $conference = new NotifyingConference($notifier->reveal());
        $talk = $this->prophesize(Talk::class);

        $notifier->notify('A talk has been added')->shouldBeCalled();

        $conference->addTalk($talk->reveal());
    }

    /** @test */
    public function it_notifies_about_adding_a_talk2()
    {
        $notifier = $this->prophesize(Notifier::class);

        $conference = new NotifyingConference($notifier->reveal());
        $talk = $this->prophesize(Talk::class);

        $conference->addTalk($talk->reveal());

        $notifier->notify('A talk has been added')->shouldHaveBeenCalled();
    }
}

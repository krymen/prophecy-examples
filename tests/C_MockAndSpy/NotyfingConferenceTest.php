<?php

namespace tests\Krymen\ProphecyExamples\C_MockAndSpy;

use Krymen\ProphecyExamples\C_MockAndSpy\NotifyingConference;
use Krymen\ProphecyExamples\C_MockAndSpy\Notifier;
use Krymen\ProphecyExamples\Talk;
use Prophecy\Argument;
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
        $notifier   = $this->prophesize(Notifier::class);
        $conference = new NotifyingConference($notifier->reveal());
        $talk       = $this->prophesize(Talk::class);

        $notifier->notify('A talk has been added', $talk)->shouldBeCalled();

        $conference->addTalk($talk->reveal());
    }

    /** @test */
    public function it_notifies_about_adding_a_talk2()
    {
        $notifier   = $this->prophesize(Notifier::class);
        $conference = new NotifyingConference($notifier->reveal());
        $talk       = $this->prophesize(Talk::class);

        $conference->addTalk($talk->reveal());

        $notifier->notify('A talk has been added', $talk)->shouldHaveBeenCalled();
    }

    /** @test */
    public function it_notifies_about_adding_a_talk3()
    {
        $notifier   = $this->getMock(Notifier::class);
        $conference = new NotifyingConference($notifier);
        $talk       = $this->getMock(Talk::class);

        $notifier->expects($this->once())
                 ->method('notify')
                 ->with('A talk has been added', $talk);

        $conference->addTalk($talk);
    }

    /** @test */
    public function it_notifies_about_adding_a_talk4()
    {
        $notifier   = $this->prophesize(Notifier::class);
        $conference = new NotifyingConference($notifier->reveal());
        $talk       = $this->prophesize(Talk::class);

        $notifier->notify('A talk has been added', $talk)->shouldBeCalledTimes(1);
        $talk->name()->shouldNotBeCalled();

        $conference->addTalk($talk->reveal());
    }

    /** @test */
    public function it_notifies_about_adding_a_talk5()
    {
        $notifier   = $this->prophesize(Notifier::class);
        $conference = new NotifyingConference($notifier->reveal());
        $talk       = $this->prophesize(Talk::class);

        $notifier->notify(Argument::is('A talk has been added'), Argument::is($talk->reveal()))->shouldBeCalled();

        $notifier->notify(Argument::exact('A talk has been added'), Argument::exact($talk->reveal()))->shouldBeCalled();

        $notifier->notify(Argument::type('string'), Argument::type(Talk::class))->shouldBeCalled();

        $notifier->notify(Argument::any(), Argument::any())->shouldBeCalled();

        $notifier->notify(Argument::cetera())->shouldBeCalled();

        $conference->addTalk($talk->reveal());
    }

    /** @test */
    public function it_generates_nice_output_if_prediction_fails()
    {
        $notifier   = $this->prophesize(Notifier::class);
        $conference = new NotifyingConference($notifier->reveal());
        $talk       = $this->prophesize(Talk::class);

        $notifier->notify('other message', $talk)->shouldBeCalled();

        $conference->addTalk($talk->reveal());
    }
}

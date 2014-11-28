<?php

namespace Krymen\ProphecyExamples\C_MockAndSpy;

class ConferenceC
{
    /** @var NotifierC */
    private $notifier;

    private $talks = [];

    public function __construct(NotifierC $notifier)
    {
        $this->notifier = $notifier;
    }

    public function addTalk(TalkC $talk)
    {
        $this->talks[] = $talk;

        $this->notifier->notify('A talk has been added');
    }
}

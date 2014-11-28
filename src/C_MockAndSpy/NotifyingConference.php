<?php

namespace Krymen\ProphecyExamples\C_MockAndSpy;

use Krymen\ProphecyExamples\Talk;

class NotifyingConference
{
    /** @var Notifier */
    private $notifier;

    private $talks = [];

    public function __construct(Notifier $notifier)
    {
        $this->notifier = $notifier;
    }

    public function addTalk(Talk $talk)
    {
        $this->talks[] = $talk;

        $this->notifier->notify('A talk has been added', $talk);
    }
}

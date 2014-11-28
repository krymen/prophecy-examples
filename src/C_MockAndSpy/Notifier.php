<?php

namespace Krymen\ProphecyExamples\C_MockAndSpy;

use Krymen\ProphecyExamples\Talk;

interface Notifier
{
    public function notify($message, Talk $talk);
}

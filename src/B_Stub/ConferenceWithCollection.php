<?php

namespace Krymen\ProphecyExamples\B_Stub;

use Krymen\ProphecyExamples\Talk;

class ConferenceWithCollection
{
    private $talks = [];

    public function addTalk(Talk $talk)
    {
        $this->talks[$talk->name()] = $talk;
    }

    public function has($talkName)
    {
        return isset($this->talks[$talkName]);
    }
}

<?php

namespace Krymen\ProphecyExamples\B_Stub;

class ConferenceB
{
    private $talks = [];

    public function addTalk(TalkB $talk)
    {
        $this->talks[$talk->name()] = $talk;
    }

    public function has($talkName)
    {
        return isset($this->talks[$talkName]);
    }
}

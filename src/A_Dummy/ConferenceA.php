<?php

namespace Krymen\ProphecyExamples\A_Dummy;

class ConferenceA
{
    private $numberOfTalks = 0;

    public function addTalk(TalkA $talk)
    {
        $this->numberOfTalks++;
    }

    public function numberOfTalks()
    {
        return $this->numberOfTalks;
    }
}

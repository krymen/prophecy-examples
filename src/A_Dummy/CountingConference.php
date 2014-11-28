<?php

namespace Krymen\ProphecyExamples\A_Dummy;

use Krymen\ProphecyExamples\Talk;

class CountingConference
{
    private $numberOfTalks = 0;

    public function addTalk(Talk $talk)
    {
        $this->numberOfTalks++;
    }

    public function numberOfTalks()
    {
        return $this->numberOfTalks;
    }
}

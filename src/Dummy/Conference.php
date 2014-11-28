<?php

namespace Krymen\ProphecyExamples\Dummy;

class Conference
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

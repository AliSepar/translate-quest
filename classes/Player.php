<?php

class Player
{
    // TODO: add name and score
    private $name;
    private $score;

    public function __construct($name, $score)
    {
        // TODO: add 👤 automatically to their name
        $this->name = $name;
        $this->score = $score;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getScore()
    {
        return $this->score;
    }
    public function setScore($score)
    {
        $this->score = $score;
    }
}

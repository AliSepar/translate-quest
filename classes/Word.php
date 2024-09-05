<?php

class Word
{
    // TODO: add word (FR) and answer (EN) - (via constructor or not? why?)
    private string $french;
    private string $english;

    public function __construct($french, $english)
    {
        $this->english = $english;
        $this->french = $french;
    }
    public function getFrench()
    {
        return $this->french;
    }

    public function getEnglish()
    {
        return $this->english;
    }

    public function verify(string $answer): bool
    {
        // TODO: use this function to verify if the provided answer by the user matches the correct one

        // Compare the user's answer with the correct English translation (case-insensitive)
        return strtolower($answer) === strtolower($this->english);
        // Bonus: allow answers with different casing (example: both bread or Bread can be correct answers, even though technically it's a different string)
        // Bonus (hard): can you allow answers with small typo's (max one character different)?
    }
}

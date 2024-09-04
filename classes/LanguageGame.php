<?php

class LanguageGame
{
    private array $words;

    public function __construct()
    {
        $this->words = [];
        // :: is used for static functions
        // They can be called without an instance of that class being created
        // and are used mostly for more *static* types of data (a fixed set of translations in this case)
        foreach (Data::words() as $frenchTranslation => $englishTranslation) {
            // TODO: create instances of the Word class to be added to the words array
            // $word = new Word($frenchTranslation, $englishTranslation);
            // $this->words[] = $word;
            $word = new Word($frenchTranslation, $englishTranslation);
            // Add the Word object to the words array with the French word as the key
            $this->words[$frenchTranslation] = $word;
            // $word->verify();
        }
    }

    public function getRandomWord()
    {
        $words = $this->words; // This is now an associative array with French words as keys
        // Check if the words array is empty
        if (empty($words)) {
            return null; // No words available
        }
        // Get a random French word key from the array
        $frenchWord = array_rand($words); // Get a random key from the associative array
        // Fetch the corresponding Word object
        $wordObject = $words[$frenchWord]; // Get the Word object using the random key
        // Assuming Word class has methods to get French and English words
        $englishWord = $wordObject->getEnglish(); // Get the English translation
        return [$frenchWord, $englishWord]; // Return both words
    }



    public function run(): void
    {
        // TODO: check for option A or B

        // Option A: user visits site first time (or wants a new word)
        // TODO: select a random word for the user to translate
        if (!isset($_POST['input_word'])) {
            $_SESSION['word'] = $this->getRandomWord();
        }


        // Option B: user has just submitted an answer
        // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
        // TODO: generate a message for the user that can be shown

    }
}

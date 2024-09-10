<?php
// require_once('Player.php');
class LanguageGame
{
    private array $words;

    public function __construct()
    {
        $this->words = [];
        foreach (Data::words() as $frenchTranslation => $englishTranslation) {
            $word = new Word($frenchTranslation, $englishTranslation);
            $this->words[$frenchTranslation] = $word;
        }
    }

    public function reset()
    {
        $_SESSION['score'] = 0;
        $_SESSION['message'] = '';
    }

    public function getRandomWord()
    {
        $words = $this->words; // This is now an associative array with French words as keys

        // Check if the words array is empty
        if (empty($words)) {
            return null; // No words available
        }
        $frenchWord = array_rand($words);
        return $frenchWord;
    }


    private function findWordByFrench(string $french): ?Word
    {
        return $this->words[$french] ?? null;
    }

    public function run(): void
    {
        global $player;

        // Initialize the player from session or create a new instance
        if (isset($_SESSION['name']) && isset($_SESSION['score'])) {
            $player = new Player($_SESSION['name'], $_SESSION['score']);
        } elseif (isset($_POST['name'])) {
            // If the form has been submitted with a name, initialize the player
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['score'] = 0;
            $player = new Player($_POST['name'], 0);
        }

        if (!isset($_SESSION['word'])) {
            $newWord = $this->getRandomWord();
            $_SESSION['word'] = $newWord;
            $_SESSION['message'] = "Translate the word: " . $newWord;
            return;
        }


        if (isset($_POST['input_word'])) {
            $usedWord = $_SESSION['word'] ?? null;
            $selectedWord = $this->findWordByFrench($usedWord);

            if ($selectedWord) {
                // Verify the user's input with the correct translation
                $isCorrect = $selectedWord->verify($_POST['input_word']);
                // Update score based on correctness
                $score = $_SESSION['score'] ?? 0; // Ensure score is initialized
                if ($isCorrect) {
                    $score += 1;
                } else {
                    if ($score !== 0) {
                        $score -= 1;
                    }
                }

                // Update the player's score and session
                $player->setScore($score);
                $_SESSION['score'] = $score;

                $message = $isCorrect ? "Correct! Great job!" : "Incorrect. Try again! The correct answer was: " . $selectedWord->getEnglish();

                // Select a new word for the next round
                $newWord = $this->getRandomWord();
                $_SESSION['word'] = $newWord;
                $message .= " The new word to translate is: " . $newWord;

                $_SESSION['message'] = $message;
                header('Location:index.php');
            } else {
                $_SESSION['message'] = "An error occurred. Please try again.";
            }
        }


        if (isset($_GET['reset'])) {
            $this->reset();
        }
    }
}

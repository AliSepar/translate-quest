<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types=1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load your classes
require_once 'classes/Data.php';
require_once 'classes/LanguageGame.php';
require_once 'classes/Player.php'; // Only needed for extra's
require_once 'classes/Word.php';

// Start the game
// check if user add name
if (isset($_POST['name'])) {
    session_start();
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['score'] = 0;
    $player = new Player($_POST['name'], 0);
}

// Don't change anything in this file
// The LanguageGame class will be your starting point
$game = new LanguageGame();
$game->run();





require 'view.php';

<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS_COUNT = 3;

function playGame(string $description, callable $getGameData): void
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);

    line($description);
    for ($i = 0; $i < GAME_ROUNDS_COUNT; $i++) {
        [$question, $answer] = $getGameData();

        line("Question: {$question}");
        $userAnswer = prompt("Your answer");

        if ($answer == $userAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$playerName}!");
            return;
        }
    }

    line("Congratulations, {$playerName}!");
}

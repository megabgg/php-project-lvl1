<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS_COUNT = 3;

function initializeGame(string $gameRule, callable $getGameParameters): void
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);

    line($gameRule);
    for ($i = 0; $i < GAME_ROUNDS_COUNT; $i++) {
        [$question, $answer] = $getGameParameters();

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

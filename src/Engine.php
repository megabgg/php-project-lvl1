<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function init(string $rulesGame, callable $game): void
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);

    line($rulesGame);
    for ($i = 0; $i < ROUNDS; $i++) {
        ['question' => $question, 'answer' => $answer] = $game();

        $userAnswer = prompt($question);

        if ($answer == $userAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$playerName}!");
            exit;
        }
    }

    line("Congratulations, {$playerName}!");
}

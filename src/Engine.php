<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function initGame(array $params): void
{
    if (checkParams($params)) {
        runGame($params);
    } else {
        line("Parameter error");
        exit;
    }
}


function checkParams(array $params): bool
{
    if (!$params['rules_game']) {
        return false;
    }
    foreach ($params['rounds'] as $round) {
        if (!$round['answer'] || !$round['question']) {
            return false;
        }
    }
    return true;
}

function getNamePlayer(): string
{
    $name = prompt('May I have your name?');
    /*if ($name) {
        line("Player name not can empty!");
        return getNamePlayer();
    }*/
    return $name;
}

function runGame(array $params): void
{
    line('Welcome to the Brain Game!');
    $playerName = getNamePlayer();
    line("Hello, %s!", $playerName);

    line($params['rules_game']);

    foreach ($params['rounds'] as $round) {
        $answer = prompt($round['question']);
        if ($answer == $round['answer']) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$round['answer']}'.");
            line("Let's try again, {$playerName}!");
            exit;
        }
    }
    line("Congratulations, {$playerName}!");
}

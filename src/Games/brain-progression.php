<?php

namespace Brain\Progression;

use function Brain\Games\Engine\playGame;

const DESCRIPTION = 'What number is missing in the progression?';

function launchGame(): void
{
    playGame(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $progressionStep = rand(1, 10);
    $progressionLength = rand(6, 10);
    $startValueProgression = rand(1, 5);
    $progression = getProgression($startValueProgression, $progressionStep, $progressionLength);
    $hiddenProgressionStep = rand(0, $progressionLength - 1);
    $answer = $progression[$hiddenProgressionStep];
    $progression[$hiddenProgressionStep] = '..';
    $question = implode(" ", $progression);
    return [$question, $answer];
}

function getProgression(int $startValue, int $step, int $length): array
{
    $result = [];
    for ($i = 0; $i < $length; $i++) {
        $result[] = $startValue + $step * $i;
    }
    return $result;
}

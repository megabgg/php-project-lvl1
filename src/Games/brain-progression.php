<?php

namespace Brain\Progression;

use function Brain\Games\Engine\initializeGame;

const DESCRIPTION = 'What number is missing in the progression?';

function launchGame(): void
{
    initializeGame(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $progressionStep = rand(1, 10);
    $progressionLength = rand(6, 10);
    $hiddenProgressionStep = rand(0, $progressionLength - 1);
    $progression = getProgression($progressionStep, $progressionLength);
    $answer = $progression[$hiddenProgressionStep];
    $progression[$hiddenProgressionStep] = '..';
    $question = implode(" ", $progression);
    return [$question, $answer];
}

function getProgression(int $step, int $length): array
{
    $currentCount = 0;
    $result = [];
    for ($j = 0; $j < $length; $j++) {
        $currentCount += $step;
        $result[] = $currentCount;
    }
    return $result;
}

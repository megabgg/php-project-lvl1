<?php

namespace Brain\Progression;

use function Brain\Games\Engine\init;

const DESCRIPTION = 'What number is missing in the progression?';

function launchGame(): bool
{
    return init(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $progressionStep = rand(1, 10);
    $progressionLength = rand(6, 10);
    $hiddenProgressionStep = rand(0, $progressionLength - 1);
    $progression = getProgression($progressionStep, $progressionLength, $hiddenProgressionStep);
    $answer = $progression['answer'];
    $question = implode(" ", $progression['question']);
    return [$question, $answer];
}

function getProgression(int $step, int $length, int $hiddenStep): array
{
    $currentCount = 0;
    $result = [];
    for ($j = 0; $j < $length; $j++) {
        $currentCount += $step;
        if ($j == $hiddenStep) {
            $result['question'][] = "..";
            $result['answer'] = $currentCount;
        } else {
            $result['question'][] = $currentCount;
        }
    }
    return $result;
}

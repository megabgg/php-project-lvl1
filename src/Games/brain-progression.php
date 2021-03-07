<?php

namespace Brain\Progression;

use function Brain\Games\Engine\init;

const DESCRIPTION = 'What number is missing in the progression?';

function game(): bool
{
    return init(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $progressionStep = rand(1, 10);
    $progressionLength = rand(6, 10);
    $progressionHideItem = rand(0, $progressionLength - 1);
    $progression = getProgression($progressionStep, $progressionLength, $progressionHideItem);
    $answer = $progression['answer'];
    $question = implode(" ", $progression['question']);
    return [$question, $answer];
}

function getProgression(int $step, int $length, int $hideNumber): array
{
    $currentCount = 0;
    $result = [];
    for ($j = 0; $j < $length; $j++) {
        $currentCount += $step;
        if ($j == $hideNumber) {
            $result['question'][] = "..";
            $result['answer'] = $currentCount;
        } else {
            $result['question'][] = $currentCount;
        }
    }
    return $result;
}

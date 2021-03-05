<?php

namespace Brain\Progression;

const DESCRIPTION = 'What number is missing in the progression?';

function game(): array
{
    $game = function () {
        $progressionStep = rand(1, 10);
        $progressionLength = rand(6, 10);
        $progressionHideItem = rand(0, $progressionLength - 1);
        $progression = getProgression($progressionStep, $progressionLength, $progressionHideItem);
        ['question' => $question, 'answer' => $answer] = $progression;
        return [
            'question' => implode(" ", $question),
            'answer'   => $answer,
        ];
    };

    return [DESCRIPTION, $game];
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
            $result['question'][] = $currentCount . ' ';
        }
    }
    return $result;
}

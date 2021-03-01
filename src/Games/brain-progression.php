<?php

namespace Brain\Progression;

use function Brain\Games\Engine\initGame;

function start(): void
{
    $params['rules_game'] = 'What number is missing in the progression?';

    for ($i = 0; $i < 3; $i++) {
        $step = rand(1, 10);
        $progressionLength = rand(6, 10);
        $hiddenNumber = rand(0, $progressionLength - 1);
        $generatedProgression = '';
        $count = 0;
        for ($j = 0; $j < $progressionLength; $j++) {
            $count += $step;
            if ($j == $hiddenNumber) {
                $generatedProgression .= ".." . ' ';
                $round['answer'] = $count;
            } else {
                $generatedProgression .= $count . ' ';
            }
        }

        $round['question'] = "Question: {$generatedProgression}";
        $params['rounds'][] = $round;
    }

    initGame($params);
}

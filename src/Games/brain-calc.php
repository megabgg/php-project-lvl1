<?php

namespace Brain\Calc;

use function Brain\Games\Engine\initGame;

function start(): void
{
    $params['rules_game'] = 'What is the result of the expression?';

    for ($i = 0; $i < 3; $i++) {
        $n1 = rand(0, 30);
        $n2 = rand(0, 30);
        $round['question'] = "Question: {$n1} + {$n2}";
        $round['answer'] = $n1 + $n2;
        $params['rounds'][] = $round;
    }

    initGame($params);
}

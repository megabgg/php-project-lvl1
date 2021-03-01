<?php

namespace Brain\Even;

use function Brain\Games\Engine\initGame;

function start(): void
{
    $params = [];
    $params['rules_game'] = 'Answer "yes" if the number is even, otherwise answer "no".';

    for ($i = 0; $i < 3; $i++) {
        $n = rand(1, 15);
        $round = [];
        $round['question'] = "Question: {$n}";
        $round['answer'] = $n % 2 == 0 ? 'yes' : 'no';
        $params['rounds'][] = $round;
    }

    initGame($params);
}

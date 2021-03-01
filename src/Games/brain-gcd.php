<?php

namespace Brain\Gcd;

use function Brain\Games\Engine\initGame;

function start(): void
{
    $params['rules_game'] = 'Find the greatest common divisor of given numbers.';

    for ($i = 0; $i < 3; $i++) {
        $n1 = rand(1, 20);
        $n2 = rand(1, 20);
        $round['question'] = "Question: {$n1} {$n2}";
        $round['answer'] = gcd($n1, $n2);
        $params['rounds'][] = $round;
    }

    initGame($params);
}

function gcd($x, $y): int
{
    while ($x != 0 && $y != 0) {
        if ($x >= $y) {
            $x = $x % $y;
        } else {
            $y = $y % $x;
        }
    }
    return $x + $y;
}
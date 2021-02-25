<?php

namespace Brain\Prime;

use function Brain\Games\Engine\initGame;

function start():void
{
    $params['rules_game'] = 'Answer "yes" if given number is prime. Otherwise answer "no"';

    for ($i = 0; $i < 3; $i++) {
        $n = rand(1, 90);
        $round['question'] = "Question: {$n}";
        $round['answer'] = isPrime($n) ? 'yes' : 'no';
        $params['rounds'][] = $round;
    }

    initGame($params);

}

function isPrime($num):bool
{
    if ($num == 1) {
        return false;
    }
    for ($i = 2; $i <= $num/2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
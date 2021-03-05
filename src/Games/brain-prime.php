<?php

namespace Brain\Prime;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no"';

function game(): array
{
    $game = function (): array {
        $num = rand(1, 90);
        return [
            'question' => "Question: {$num}",
            'answer'   => isPrime($num) ? "yes" : "no",
        ];
    };

    return [DESCRIPTION, $game];
}

function isPrime(int $num): bool
{
    if ($num == 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

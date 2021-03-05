<?php

namespace Brain\Gcd;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function game(): array
{
    $game = function (): array {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        return [
            'question' => "Question: {$num1} {$num2}",
            'answer'   => getGcd($num1, $num2),
        ];
    };

    return [DESCRIPTION, $game];
}

function getGcd(int $x, int $y): int
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

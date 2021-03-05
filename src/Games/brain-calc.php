<?php

namespace Brain\Calc;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ["+","-","*",];

function game(): array
{
    $game = function (): array {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $operation = OPERATIONS[array_rand(OPERATIONS)];

        return [
            'question' => "Question: {$num1} {$operation} {$num2}",
            'answer'   => calc($num1, $num2, $operation),
        ];
    };

    return [DESCRIPTION, $game];
}

function calc(int $num1, int $num2, string $operation): int
{
    switch ($operation) {
        case "+":
            return $num1 + $num2;
        case "*":
            return $num1 * $num2;
        case "-":
            return $num1 - $num2;
        default:
            return 0;
    }
}

<?php

namespace Brain\Calc;

use Exception;

use function Brain\Games\Engine\init;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ["+", "-", "*",];

function launchGame(): void
{
    initializeGame(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $operation = OPERATIONS[array_rand(OPERATIONS)];
    $question = "{$num1} {$operation} {$num2}";
    $answer = calculate($num1, $num2, $operation);

    return [$question, $answer];
}

function calculate(int $firstNum, int $secondNum, string $operation): int
{
    switch ($operation) {
        case "*":
            return $firstNum * $secondNum;
        case "-":
            return $firstNum - $secondNum;
        case "+":
            return $firstNum + $secondNum;
        default:
            throw new Exception('Unknown operation.');
    }
}

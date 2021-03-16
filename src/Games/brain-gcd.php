<?php

namespace Brain\Gcd;

use function Brain\Games\Engine\init;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function launchGame(): void
{
    initializeGame(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $num1 = rand(1, 20);
    $num2 = rand(1, 20);
    $question = "{$num1} {$num2}";
    $answer = calculateGcd($num1, $num2);
    return [$question, $answer];
}

function calculateGcd(int $firstNum, int $secondNum): int
{
    $modulo = $firstNum % $secondNum;
    return $modulo === 0 ? $secondNum : calculateGcd($secondNum, $modulo);
}

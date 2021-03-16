<?php

namespace Brain\Prime;

use function Brain\Games\Engine\init;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no"';

function launchGame(): bool
{
    return init(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $num = rand(1, 90);
    $question = "{$num}";
    $answer = isPrime($num) ? "yes" : "no";
    return [$question, $answer];
}

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

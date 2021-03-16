<?php

namespace Brain\Even;

use function Brain\Games\Engine\init;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function launchGame(): bool
{
    return init(DESCRIPTION, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $question = rand(0, 100);
    $answer = isEven($question) ? 'yes' : 'no';

    return [$question, $answer];
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

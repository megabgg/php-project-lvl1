<?php

namespace Brain\Even;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function game(): array
{
    $game = function (): array {
        $num = rand(1, 100);
        return [
            'question' => "Question: {$num}",
            'answer'   => getAnswer($num),
        ];
    };

    return [DESCRIPTION, $game];
}

function getAnswer(int $num): string
{
    return $num % 2 == 0 ? 'yes' : 'no';
}

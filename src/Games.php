<?php

namespace BrainGames\Games;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS = 3;

function brainEven()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".');
    $userName = \cli\prompt('May I have your name?');

    for ($i=0; $i<ATTEMPTS; $i++) {
        $question = rand();
        $isEven = (($question % 2) == 0);
        $correctAnswer = $isEven ? 'yes' : 'no';
        line('Question: ' . $question);
        $userAnswer = prompt('Your answer: ');
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line($userAnswer . ' is wrong answer ;(. Correct answer was ' . $correctAnswer);
            line("Let's try again, " . $userName);
            exit(0);
        }
    }

    line('Congratulations, ' . $userName . '!');
}

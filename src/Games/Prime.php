<?php

namespace BrainGames\Games\Prime;

function getRules()
{
    return 'Answer "yes" if number prime otherwise answer "no".';
}

function getQuestionAndAnswer()
{
    $question = rand() + 2;

    $correctAnswer = isPrime($question) ? 'yes' : 'no';

    return array($question, $correctAnswer);
}

function isPrime($number)
{
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

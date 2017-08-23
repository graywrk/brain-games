<?php

namespace BrainGames\Games\Calc;

function run() {
    $getRules = function () {
        return 'What is the result of the expression?';
    };

    $getQuestionAndAnswer = function () {
        $first = rand();
        $second = rand();

        $opCode = rand(0, 2);
        switch ($opCode) {
            case '0':
                $op = '+';
                $correctAnswer = $first + $second;
                break;
            case '1':
                $op = '-';
                $correctAnswer = $first - $second;
                break;
            case '2':
                $op = '*';
                $correctAnswer = $first * $second;
                break;
        }

        $question = "{$first} {$op} {$second}";

        return array($question, $correctAnswer);
    };

    $game = \BrainGames\Games\game($getRules, $getQuestionAndAnswer);
    $game();
}

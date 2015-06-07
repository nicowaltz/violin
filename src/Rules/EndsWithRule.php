<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class EndsWithRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        if (strlen($args[0]) === 0) {
            return false;
        }
        $index = strlen($value) - strlen($args[0]);
        return (bool)(substr($value, $index) === $args[0]); 

    }

    public function error()
    {
        return '{field} must end with {$0}.';
    }

    public function canSkip()
    {
        return false;
    }
}

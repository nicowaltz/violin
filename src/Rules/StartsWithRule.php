<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class StartsWithRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        if (strlen($args[0]) === 0) {
            return false;
        }
        $length = strlen($args[0]);
        return (bool)(substr($value, 0, $length) === $args[0]);
    }

    public function error()
    {
        return '{field} must start with {$0}.';
    }

    public function canSkip()
    {
        return false;
    }
}

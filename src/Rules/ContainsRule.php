<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class ContainsRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        if (strlen($args[0]) === 0) {
            return false;
        }
        return (bool)(substr_count($value, $args[0]) > 0);
    }

    public function error()
    {
        return '{field} must contain {$0}.';
    }

    public function canSkip()
    {
        return false;
    }
}

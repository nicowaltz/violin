<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class StartsWithRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        $substring = $args[0];
        return empty($substring) ? false : $this->startsWith($value, $substring);  
    }

    protected function startsWith($value, $substring) {
        $length = strlen($substring);
        $start = 0;
        return substr($value, $start, $length) === $substring;
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

<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class StartsWithRule implements RuleContract
{
    public function run($string, $input, $args)
    {
        $substring = $args[0];
        return empty($substring) ? false : $this->startsWith($string, $substring);
    }

    protected function startsWith($string, $substring)
    {
        $length = strlen($substring);
        $start = 0;
        return substr($string, $start, $length) === $substring;
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

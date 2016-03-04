<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class StartsWithRule implements RuleContract
{
    public function run($string, $input, $args)
    {
        return empty($args[0]) ? false : $this->startsWith($string, $args[0]);
    }

    protected function startsWith($string, $substring)
    {
        $length = strlen($substring);
        return substr($string, 0, $length) === $substring;
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

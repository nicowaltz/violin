<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class EndsWithRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        $substring = $args[0];
        
        return empty($substring) ? false : $this->endsWith($value, $substring);

    }

    protected function endsWith($value, $substring)
    {
        $index = strlen($value) - strlen($substring);
        return substr($value, $index) === $substring;

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

<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class EndsWithRule implements RuleContract
{
    public function run($string, $input, $args)
    {
        $substring = $args[0];
        
        return empty($substring) ? false : $this->endsWith($string, $substring);

    }

    protected function endsWith($string, $substring)
    {
        $index = strlen($string) - strlen($substring);
        return substr($string, $index) === $substring;

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

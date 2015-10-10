<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class EndsWithRule implements RuleContract
{
    public function run($string, $input, $args)
    {
        return empty($args[0]) ? false : $this->endsWith($string, $args[0]);
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

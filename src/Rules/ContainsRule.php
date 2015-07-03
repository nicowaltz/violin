<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class ContainsRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        $substring = $args[0];
        return empty($substring) ? false : $this->contains($value, $substring);
    }

    protected function contains($value, $substring)
    {
        $occurences = substr_count($value, $substring);
        return $occurences > 0;
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

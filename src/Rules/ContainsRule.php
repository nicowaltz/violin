<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class ContainsRule implements RuleContract
{
    public function run($string, $input, $args)
    {
        $substring = $args[0];
        return empty($substring) ? false : $this->contains($string, $substring);
    }

    protected function contains($string, $substring)
    {
        $occurences = substr_count($string, $substring);
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

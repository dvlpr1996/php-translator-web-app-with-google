<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules;

use app\Core\Validation\Rules\Contract\AbstractRules;

class Alpha extends AbstractRules
{
    public function check(string $val, string $param = null): bool
    {
        return is_string($val) && $this->regexCheck($val);
    }

    private function regexCheck($val): bool
    {
        return preg_match('/^[\pL\pM]+$/u', $val) ? true : false;
    }
}

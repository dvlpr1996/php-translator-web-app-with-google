<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules;

use app\Core\Validation\Rules\Contract\RulesInterface;

class Required implements RulesInterface
{
    protected $msg = "The @attr only allows alphabet characters";

    public function check($val, $param = null): bool
    {
        return !empty($val) && isset($val) ? true : false;
    }
}

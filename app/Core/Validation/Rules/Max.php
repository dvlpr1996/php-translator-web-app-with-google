<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules;

use app\Core\Validation\Rules\Contract\AbstractRules;

class Max extends AbstractRules
{
    public function check($val, $param = null): bool
    {
        return (strlen($val) >= $param) ? false : true;
    }
}

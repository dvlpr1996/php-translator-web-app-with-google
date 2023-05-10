<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules;

use app\Core\FlashMessage\FlashMessage;
use app\Core\Validation\Rules\Contract\AbstractRules;

class Alpha extends AbstractRules
{
    private $msg = 'the :filed must be Alpha';
    public function check(string $val, string $param = null): bool
    {
        if (!is_string($val) || empty($val)) {
            $this->errorMsg($val, $this->msg);
            return false;
        }
        return true;
    }
}

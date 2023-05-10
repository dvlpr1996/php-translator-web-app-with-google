<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules;

use app\Core\Validation\Rules\Contract\AbstractRules;

class Not extends AbstractRules
{
    public $msg = ':filed can not be :not';
    public function check($val, $param = null):bool
    {
        if ($val === $param) {
            $this->errorMsg($val, $this->msg);
            return false;
        }
        return true;
    }
}

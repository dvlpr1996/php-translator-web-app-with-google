<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules;

use app\Core\Validation\Rules\Contract\AbstractRules;

class Required extends AbstractRules
{
    protected $msg = "The :filed can not be empty";

    public function check($val, $param = null):bool
    {
        if (!empty($val) && isset($val)) {
            $this->errorMsg($val, $this->msg);
            return false;
        }
        return true;
    }
}

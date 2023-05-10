<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules;

use app\Core\Validation\Rules\Contract\AbstractRules;

class Max extends AbstractRules
{
    public $msg = 'the maximum length of :filed must be :max';
    public function check($val, $param = null):bool
    {
        if (strlen($val) >= $param) {
            $this->errorMsg($val, $this->msg);
            return false;
        }
        return true;
    }
}

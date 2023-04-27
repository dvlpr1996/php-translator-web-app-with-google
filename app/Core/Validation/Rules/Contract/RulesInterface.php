<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules\Contract;

interface RulesInterface
{
    public function check(string $val, string $param = null): bool;
}

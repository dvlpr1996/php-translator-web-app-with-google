<?php

declare(strict_types=1);

namespace app\Core\Validation\Contract;

interface ValidationInterface
{
    public function rules(): array;
}

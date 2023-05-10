<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules\Contract;

use app\Core\Validation\Rules\Traits\RulesTrait;
use app\Core\Validation\Rules\Contract\RulesInterface;

abstract class AbstractRules implements RulesInterface
{
    use RulesTrait;
}

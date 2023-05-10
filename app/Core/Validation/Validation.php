<?php

declare(strict_types=1);

namespace app\Core\Validation;

use app\Core\Validation\Contract\ValidationInterface;

class Validation
{
    private const RULE_NAMESPACE = 'app\Core\Validation\Rules\\';

    public function __construct(
        private ValidationInterface $rules,
        private array $data
    ) {
    }

    public function checkRules()
    {
        foreach ($this->rules->rules() as $key => $rules) {
            $value = $this->data[$key];
            if (!$this->getRules($rules, $value)) {
                return false;
            }
        }
        return true;
    }

    private function getRules($rules, $value)
    {
        foreach ($rules as $rule) {
            $param = null;

            if (str_contains($rule, ':')) {
                $getRuleAttributes = explode(':', $rule);
                $rule = $getRuleAttributes[0];
                $param = $getRuleAttributes[1];
            }

            if (!$this->isValid($rule, $value, $param)) {
                return false;
            }
        }
        return true;
    }

    private function isValid($rule, $value, $param = null)
    {
        $ruleClass = $this->ruleNameSpaceResolver($rule);
        return (new $ruleClass)->check($value, $param);
    }

    private function ruleNameSpaceResolver($rule)
    {
        return self::RULE_NAMESPACE . ucfirst($rule);
    }
}

<?php

declare(strict_types=1);

namespace app\Core\Validation\Rules\Trait;

trait RulesTrait
{
    protected function safeStr(string $val): string
    {
        $val = stripslashes(trim($val));
        $val = strip_tags($val);
        $val = $this->rmExtraBlank($val);
        $val = html_entity_decode(htmlentities($val));
        $val = htmlspecialchars($val ?? '', ENT_QUOTES, 'UTF-8');
        return $val;
    }

    private function rmExtraBlank(string $string): string
    {
        return preg_replace('/\s+/im', ' ', trim($string));
    }
}

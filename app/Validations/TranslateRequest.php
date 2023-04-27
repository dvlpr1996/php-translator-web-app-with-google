<?php

declare(strict_types=1);

namespace app\Validations;

use app\Core\Validation\Contract\ValidationInterface;

class TranslateRequest implements ValidationInterface
{
    public function rules(): array
    {
        return [
            'translateFROM' => ['required', 'alpha', 'not:ndLang'],
            'mainText' => ['required', 'alpha', 'max:500', 'min:1'],
            'translateTo' => ['required', 'alpha', 'not:ndLang']
        ];
    }

    private function allowedLangValues(): bool
    {
        return true;
    }
}

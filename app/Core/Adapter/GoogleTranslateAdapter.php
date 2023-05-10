<?php

declare(strict_types=1);

namespace app\Core\Adapter;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Symfony\Component\HttpFoundation\Request;

class GoogleTranslateAdapter
{
    public static function translation(Request $request)
    {
        try {
            $translated = GoogleTranslate::trans(
                $request->get('mainText'),
                $request->get('translateTo'),
                $request->get('translateFROM')
            );
        } catch (\Exception $e) {
            displayError('something wrong happened try again');
        }

        return $translated;
    }
}

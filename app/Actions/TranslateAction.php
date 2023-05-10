<?php

declare(strict_types=1);

namespace app\Actions;

use app\Actions\BaseAction;
use app\Core\Validation\Validation;
use app\Validations\TranslateRequest;
use app\Core\Adapter\GoogleTranslateAdapter;
use Symfony\Component\HttpFoundation\Request;

class TranslateAction extends BaseAction
{
    public function translate(Request $request)
    {
        $this->validation($request);
        $translated = GoogleTranslateAdapter::translation($request);
    }

    private function validation(Request $request)
    {
        $validation = new Validation(
            (new TranslateRequest),
            $this->allRequest($request)
        );

        $validated = $validation->checkRules();

        if (!$validated) {
            return back();
        }
        return true;
    }
}

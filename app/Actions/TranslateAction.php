<?php

declare(strict_types=1);

namespace app\Actions;

use app\Actions\BaseAction;
use app\Core\Validation\Validation;
use app\Validations\TranslateRequest;
use Symfony\Component\HttpFoundation\Request;

class TranslateAction extends BaseAction
{
    public function translate(Request $request)
    {
        $validation = new Validation((new TranslateRequest), $this->allRequest($request));
        dd($validation->checkRules());
    }
}

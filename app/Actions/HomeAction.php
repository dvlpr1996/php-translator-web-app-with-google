<?php

declare(strict_types=1);

namespace app\Actions;

use app\Actions\BaseAction;

class HomeAction extends BaseAction
{
    public function index()
    {
        return view('index');
    }
}

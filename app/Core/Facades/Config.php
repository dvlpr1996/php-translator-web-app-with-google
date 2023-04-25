<?php

declare(strict_types=1);

namespace app\Core\Facades;

use app\Core\Facades\Facade;

class Config extends Facade
{
	protected static $getFacadeName = '\app\Core\Config\ConfigHandler';
}

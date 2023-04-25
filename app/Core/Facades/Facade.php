<?php

declare(strict_types=1);

namespace app\Core\Facades;

class Facade
{
	protected static $getFacadeName;

	public static function __callStatic($name, $arguments)
	{
		$instance = new static::$getFacadeName;

		if (!$instance)
			throw new \RuntimeException('A facade root has not been set.');

		return $instance->$name(...$arguments);
	}

	public function __call(string $method, array $args)
	{
		return self::__callStatic($method, $args);
	}
}

<?php

declare(strict_types=1);

namespace app\Core\Adapter;

use Jenssegers\Blade\Blade;
use app\Exceptions\ViewFileDoesNotExistsException;

final class BladeAdapter
{
	private const VIEW_EXTENSION = '.blade.php';
	private const  CACHE_TPL_PATH = CACHE_PATH . 'views/';

	private function load()
	{
		if (!is_dir(self::CACHE_TPL_PATH))
			mkdir(self::CACHE_TPL_PATH);

		return new Blade(VIEW_PATH, self::CACHE_TPL_PATH);
	}

	private function renderView(string $viewPath, array $viewData = [])
	{
		if (!checkFileExists($this->generateViewPath($viewPath))) {
			throw new ViewFileDoesNotExistsException($viewPath . ' View File Does Not Exists');
        }

		echo $this->load()->render($viewPath,  $viewData);
	}

	private function generateViewPath(string $path): string
	{
		$path = str_replace(".", "/", implode(".", explode('.', $path)));
		return VIEW_PATH . $path . self::VIEW_EXTENSION;
	}

	public function display(string $viewPath, array $viewData = [])
	{
		return $this->renderView(strtolower($viewPath), $viewData);
	}
}

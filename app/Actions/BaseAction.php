<?php

declare(strict_types=1);

namespace app\Actions;

use Buki\Router\Http\Controller as Action;
use Symfony\Component\HttpFoundation\Request;

class BaseAction extends Action
{
    protected function view(string $path, array $data = [])
    {
        return view($path, $data);
    }

    protected function allRequest(Request $request): array
    {
        return $request->request->all();
    }

    protected function get(Request $request, string $item): string
    {
        return $request->request->get($item);
    }

    protected function has(Request $request, string $item): bool
    {
        return $request->request->has($item);
    }

    protected function file(Request $request, string $item)
    {
        return $request->files->get($item);
    }
}

<?php

declare(strict_types=1);

namespace app\Core\Config;

use app\Exceptions\ConfigKeyNotFoundException;
use app\Exceptions\ConfigFileNotFoundException;

final class ConfigHandler
{
    private function configPathResolver(string $key): string
    {
        return CONFIG_PATH . strtolower(explode('.', $key)[0]) . '.php';
    }

    private function configKeyResolver(string $key): string
    {
        return explode('.', $key)[1];
    }

    private function getData(string $key)
    {
        $configKye = $this->configKeyResolver($key);

        $data = require_once $this->configFile($key);

        if (!is_array($data)) return [];

        if (!array_key_exists($configKye, $data)) {
            throw new ConfigKeyNotFoundException('Your Config Key Not Found');
        }

        return $data[$configKye];
    }

    private function configFile($key)
    {
        $configFile = $this->configPathResolver($key);

        if (!is_file($configFile) && !is_readable($configFile)) {
            throw new ConfigFileNotFoundException('Config File Not Found');
        }

        return $configFile;
    }

    public function get(string $key)
    {
        if (empty($key)) {
            throw new ConfigKeyNotFoundException('Your Config Key Can Not Be Empty');
        }

        if (count(explode('.', $key)) === 1) {
            $data = require_once $this->configFile($key);
            return is_array($data) ? $data : [];
        }
        return $this->getData($key);
    }
}

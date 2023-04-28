<?php

declare(strict_types=1);

namespace app\Core\CsrfToken;

class Csrf
{
    private int $key;
    private int $keyExpire;

    public function __construct()
    {
        $config = config('csrfToken');
        $this->key = $config['token_len'];
        $this->keyExpire = $config['token_expire_time'];
    }

    public function csrfTokenInput()
    {
        echo '<input type="hidden" name="csrf" value=' . $this->csrfToken() . '>';
    }

    private function csrfToken()
    {
        return $_SESSION['key'] ?? '';
    }

    private function csrfTokenKey()
    {
        $_SESSION['key'] = bin2hex(random_bytes($this->key));
    }

    private function csrfTokenKeyExpire()
    {
        $_SESSION['key-expire'] = $this->keyExpire;
    }

    public function createCsrfToken()
    {
        $this->csrfTokenKey();
        $this->csrfTokenKeyExpire();
    }
}

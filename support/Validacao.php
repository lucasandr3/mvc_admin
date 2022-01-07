<?php

namespace Support;

class Validacao
{
    public function validaEmail(string $email): string
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
    }

    public function validaString(string $string): string
    {
        return filter_var($string, FILTER_SANITIZE_STRING, FILTER_SANITIZE_ADD_SLASHES);
    }
}


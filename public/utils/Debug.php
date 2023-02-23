<?php

namespace Exceptions\utils;
trait Debug
{
    public function dd($var, $message = ''): void
    {
        var_dump($var);
        die($message);
    }
}
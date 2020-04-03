<?php

namespace App;

use Faker\Provider\Base;

/**
 * Generate random token
 *
 * Class Token
 * @package App
 */
class Token
{
    const DEFAULT_LENGTH = 6;

    public static function get($length = self::DEFAULT_LENGTH)
    {
        return Base::regexify("[A-Za-z0-9]{{$length}}");
    }
}

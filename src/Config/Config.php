<?php

namespace Log\Config;

/**
 * Class Config
 * @package App\Config
 */
class Config implements ConfigInterface
{
    /**
     * @return string
     */
    public static function getFilePath(): string
    {
        return storage_path() . '/logs/laravel.log';
    }
}

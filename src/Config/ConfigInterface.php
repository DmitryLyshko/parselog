<?php

namespace Log\Config;

/**
 * Interface ConfigInterface
 * @package App\Config
 */
interface ConfigInterface
{
    /**
     * @return string
     */
    public static function getFilePath(): string;
}

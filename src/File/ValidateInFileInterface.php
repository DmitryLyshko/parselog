<?php

namespace Log\File;

/**
 * Interface ValidateInFileInterface
 * @package parselog\File
 */
interface ValidateInFileInterface
{
    /**
     * @param string $file_path
     * @return bool
     */
    public static function isFile(string $file_path): bool;
}
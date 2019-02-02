<?php

namespace Log\File;

/**
 * Class ValidateFile
 * @package App\File
 */
class ValidateFile implements ValidateInFileInterface
{
    /**
     * @param string $file_path
     * @return bool
     */
    public static function isFile(string $file_path): bool
    {
        return is_file($file_path);
    }
}

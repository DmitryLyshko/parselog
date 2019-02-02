<?php

namespace Log\File;

use App\File\ValidateFile;

/**
 * Class File
 * @package parselog\File
 */
class File implements FileInterface
{
    /**
     * @param string $file_path
     * @return bool
     */
    public static function checkFile(string $file_path): bool
    {
        return ValidateFile::isFile($file_path);
    }

    /**
     * @param string $file_path
     * @return array
     */
    public static function fileToArray(string $file_path): array
    {
        return file($file_path);
    }
}

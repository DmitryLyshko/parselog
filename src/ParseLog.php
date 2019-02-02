<?php

namespace src;

use App\Config\Config;
use App\Parser\ParseArray;
use Exception;
use src\File\File;

/**
 * Class ParseLog
 * @package parselog
 */
class ParseLog
{
    /**
     * @throws Exception
     */
    public static function parse()
    {
        $file_path = Config::getFilePath();
        $file_array = self::getFile($file_path);
        $parse_array = new ParseArray($file_array);
        return $parse_array->parseArray();
    }

    /**
     * @param string $file_path
     * @return array
     * @throws Exception
     */
    public static function getFile(string $file_path): array
    {
        if (File::checkFile($file_path) === false) {
            throw new Exception("File not found");
        }

        return File::fileToArray($file_path);
    }
}

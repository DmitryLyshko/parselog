<?php

namespace Log;

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
     * @param string $date_start
     * @param string $date_end
     * @return array
     * @throws Exception
     */
    public static function parse(string $date_start = '', string $date_end = '')
    {
        $file_path = Config::getFilePath();
        $file_array = self::getFile($file_path);
        $parse_array = new ParseArray($file_array, $date_start, $date_end);
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

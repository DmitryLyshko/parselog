<?php

namespace Log\File;

/**
 * Interface FileInterface
 * @package parselog\File
 */
interface FileInterface
{
    /**
     * @param string $file_path
     * @return bool
     */
    public static function checkFile(string $file_path): bool;

    /**
     * @param string $filer_src
     * @return array
     */
   public static function fileToArray(string $filer_src): array;
}

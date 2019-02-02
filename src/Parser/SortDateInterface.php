<?php

namespace Log\Parser;

/**
 * Interface SortDateInterface
 * @package App\Parser
 */
interface SortDateInterface
{
    /**
     * @param array $array_sort
     * @param string $time_start
     * @param string $time_end
     * @return array
     */
    public static function sortDateArray(array $array_sort, string $time_start = '', string $time_end = ''): array;
}
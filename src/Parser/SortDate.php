<?php

namespace App\Parser;

/**
 * Class SortDate
 * @package App\Parser
 */
class SortDate implements SortDateInterface
{
    /**
     * @param array $array_sort
     * @param string $time_start
     * @param string $time_end
     * @return array
     */
    public static function sortDateArray(array $array_sort, string $time_start = '', string $time_end = ''): array
    {
        $date_array = [];
        foreach($array_sort as $key => $arr) {
            if ($time_start !== '' && (int) $time_start > (int) $arr['date']) {
                unset($array_sort[$key]);
                continue;
            }

            if ($time_end !== '' && (int) $time_end > (int) $arr['date']) {
                unset($array_sort[$key]);
                continue;
            }

            $date_array[$key] = $arr['date'];
        }

        array_multisort($date_array, SORT_STRING, $array_sort);
        return $date_array;
    }
}

<?php

namespace App\Parser;

use DateTime;
use Exception;

/**
 * Class ParseArray
 * @package App\Parser
 */
class ParseArray implements ParseArrayInterface
{
    private $array_line = [];
    private $date_start = '';
    private $date_end = '';

    /**
     * ParseArrayInterface constructor.
     * @param array $array_line
     * @param string $date_start
     * @param string $date_end
     */
    public function __construct(array $array_line, string $date_start, string $date_end)
    {
        $this->array_line = $array_line;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
    }

    /**
     * @return array
     */
    public function parseArray(): array
    {
        $result = [];
        foreach ($this->array_line as $line) {
            preg_match('/\[.*?]/', $line, $m);
            $timestamp = '';
            if (isset($m[0])) {
                $timestamp = $this->isDate(trim($m[0], '[]'));
            }

            if ($timestamp !== '') {
                 $result[] = [
                     'date' => $timestamp,
                     'error' => $line
                 ];
            }
        }

        return SortDate::sortDateArray($result, $this->date_start, $this->date_end);
    }

    /**
     * @param string $date
     * @return string
     */
    private function isDate(string $date): string
    {
        try {
            $date = new DateTime($date);
        } catch (Exception $e) {
            return '';
        }

        return $date->getTimestamp();
    }
}

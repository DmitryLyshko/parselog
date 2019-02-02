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

    /**
     * ParseArrayInterface constructor.
     * @param array $array_line
     */
    public function __construct(array $array_line)
    {
        $this->array_line = $array_line;
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

        return SortDate::sortDateArray($result);
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

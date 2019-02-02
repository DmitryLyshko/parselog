<?php

namespace Log\Parser;

/**
 * Interface ParseArrayInterface
 * @package App\Parser
 */
interface ParseArrayInterface
{
    /**
     * ParseArrayInterface constructor.
     * @param array $array_line
     * @param string $date_start
     * @param string $date_end
     */
    public function __construct(array $array_line, string $date_start, string $date_end);

    /**
     * @return array
     */
    public function parseArray(): array;
}

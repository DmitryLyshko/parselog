<?php

namespace App\Parser;

/**
 * Interface ParseArrayInterface
 * @package App\Parser
 */
interface ParseArrayInterface
{
    /**
     * ParseArrayInterface constructor.
     * @param array $array_line
     */
    public function __construct(array $array_line);

    /**
     * @return array
     */
    public function parseArray(): array;
}

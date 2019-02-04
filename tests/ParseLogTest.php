<?php

declare(strict_types=1);

namespace Log\tests;

use Log\ParseLog;
use PHPUnit\Framework\TestCase;

/**
 * Class ParseLogTest
 */
class ParseLogTest extends TestCase
{
    public function testGetFile()
    {
         ParseLog::getFile('');
    }
}

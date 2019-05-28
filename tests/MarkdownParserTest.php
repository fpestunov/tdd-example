<?php

use Example\MarkdownParser;
use PHPUnit\Framework\TestCase;

class MarkdownParserTest extends TestCase
{
    public function testMarkdownParserCanBeCreated()
    {
        $m = new MarkdownParser;
    }
}

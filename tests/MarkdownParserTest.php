<?php

use Example\MarkdownParser;
use PHPUnit\Framework\TestCase;

class MarkdownParserTest extends TestCase
{
    /**
     * Awesome!
     *
     * Now our test passes! We are at the GREEN stage
     * of the RED-GREEN-REFACTOR process. Next we could
     * have a REFACTOR stage to improve our code, while
     * making sure that our test still passes. However,
     * we can't really improve the instantiation so
     * we will go back to RED in the next part! :)
     *
     * Go ahead and run the test to see the wonderful
     * green bar of glory, and then switch to part
     * three.
     */
    public function testMarkdownParserCanBeCreated()
    {
        $m = new MarkdownParser;
    }
}

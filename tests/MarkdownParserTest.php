<?php

use Example\MarkdownParser;
use PHPUnit\Framework\TestCase;

class MarkdownParserTest extends TestCase
{
    public function testMarkdownParserCanBeCreated()
    {
        $m = new MarkdownParser;
    }

    public function testBoldTextCanBeParsed()
    {
        $m = new MarkdownParser;
        $e = 'foo**bar**baz';
        $r = $m->parseBold($e);
        $this->assertEquals('foo<strong>bar</strong>baz', $r);
    }

    public function testLinksCanBeParsed()
    {
        $m = new MarkdownParser;
        $e = 'foo[bar](baz)boo';
        $r = $m->parseLinks($e);
        $this->assertEquals('foo<a href="baz">bar</a>boo', $r);
    }

    public function testImagesCanBeParsed()
    {
        $m = new MarkdownParser;

        $e = 'foo ![bar](baz) boo';
        $r = $m->parseImages($e);
        $this->assertEquals('foo <img src="baz" alt="bar" /> boo', $r);
    }    

    public function testCompleteMarkdownCanBeParsed()
    {
        $m = new MarkdownParser;

        $input = 'The **quick** brown [fox](jumped) over the ![lazy](dog).';
        $expected = 'The <strong>quick</strong> brown <a href="jumped">fox</a>'.
            ' over the <img src="dog" alt="lazy" />.';
        $r = $m->parse($input);
        $this->assertEquals($expected, $r);
    }    
}

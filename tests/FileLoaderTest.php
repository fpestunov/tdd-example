<?php

use Example\FileLoader;
use PHPUnit\Framework\TestCase;

class FileLoaderTest extends TestCase
{
    public function testFileLoaderClassCanBeCreated()
    {
        $f = new FileLoader;
    }

    public function testFileLoaderCanLoadFileContent()
    {
        $f = new FileLoader;
        $r = $f->get(__DIR__.'/fixtures/simple.md');
        $this->assertEquals("Foo\r\n", $r);
    }

    public function testFileLoaderReturnsFalseWhenFileDoesNotExist()
    {
        $f = new FileLoader;
        $r = $f->get('file_does_not_exist');
        $this->assertFalse($r);
    }
}
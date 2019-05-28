<?php

namespace Example;

class FileLoader
{
    /**
     * Retrieve the contents of a file at a given path.
     *
     * @param string $path
     * @return string
     */
    public function get($path)
    {
        if (! file_exists($path)) {
            return false;
        }
        return file_get_contents($path);
    }
}
<?php

namespace test;

class LinkMaker
{
    private readonly string $originalLink;

    public function __construct($originalLink)
    {
        $this->originalLink = $originalLink;
    }

    public function setLink(int $length)
    {
        $originalLink = bin2hex(random_bytes(strlen($this->originalLink)));

        return substr($originalLink, 0, $length);
    }
}

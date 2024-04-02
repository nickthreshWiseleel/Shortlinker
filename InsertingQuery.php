<?php

namespace test;

require('SQLQuery.php');

class InsertingQuery extends SQLQuery
{
    private readonly string $linksTable;
    private readonly string $originalLinksColumn;
    private readonly string $shortLinksColumn;
    private readonly string $originalLink;
    private readonly string $shortLink;

    public function __construct(string $linksTable, string $originalLinksColumn, string $shortLinksColumn, string $originalLink, string $shortLink)
    {
        $this->linksTable = $linksTable;
        $this->originalLinksColumn = $originalLinksColumn;
        $this->shortLinksColumn = $shortLinksColumn;
        $this->originalLink = $originalLink;
        $this->shortLink = $shortLink;
    }

    public function execute(string $returningParameter)
    {
        return
            "INSERT INTO {$this->linksTable} ({$this->originalLinksColumn}, {$this->shortLinksColumn})
        VALUES ('{$this->originalLink}', '{$this->shortLink}')
        RETURNING {$returningParameter}";
    }
}

<?php

namespace test;

class SelectingQuery extends SQLQuery
{
    private readonly string $linksTable;
    private readonly string $selectColumn;
    private readonly string $whereColumn;
    private readonly string $link;

    public function __construct(string $linksTable, string $selectColumn, string $whereColumn, string $link)
    {
        $this->linksTable = $linksTable;
        $this->selectColumn = $selectColumn;
        $this->whereColumn = $whereColumn;
        $this->link = $link;
    }

    public function execute(string $returningParameter)
    {
        return "SELECT {$this->selectColumn} FROM {$this->linksTable} WHERE {$this->whereColumn} = '{$this->link}'";
    }
}

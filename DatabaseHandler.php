<?php

namespace test;

abstract class DatabaseHandler
{
    abstract public function processQuery(SQLQuery $query, string $returningParameter);
}

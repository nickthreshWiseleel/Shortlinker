<?php

namespace test;

abstract class SQLQuery
{
    abstract public function execute(string $returningParameter);
}

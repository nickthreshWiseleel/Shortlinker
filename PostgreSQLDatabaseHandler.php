<?php

namespace test;

require('DatabaseHandler.php');

use PgSQL;

class PostgreSQLDatabaseHandler extends DatabaseHandler
{
    public readonly PgSql\Connection $connection;

    public function __construct(PgSql\Connection $connection)
    {
        $this->connection = $connection;
    }

    public function processQuery(SQLQuery $query, string $returningParameter)
    {
        return pg_fetch_result(pg_query($this->connection, $query->execute($returningParameter)), 0);
    }
}

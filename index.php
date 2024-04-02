<?php

namespace test;

header('Access-Control-Allow-Origin: *');

require('LinkMaker.php');
require('PostgreSQLDatabaseHandler.php');
require('InsertingQuery.php');
require('SelectingQuery.php');

global $databaseConnection;
$databaseConnection = pg_connect("host=localhost dbname=postgres user=php password=");

$creatingTable =
    "CREATE TABLE IF NOT EXISTS Links (
    id int serial PRIMARY KEY NOT NULL, 
    link varchar NOT NULL,
    short varchar NOT NULL)";

// for the first run
// pg_query($databaseConnection, $creatingTable);

$shortlinkLength = 5;
$domain = "http://localhost:8000/?url=";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['url'])) {

    $originalLink = $_POST['url'];

    $linkMaker = new LinkMaker($originalLink);

    $selectingQuery = new SelectingQuery("links", "short", "short", $shortLink);

    $PostgreSQLDatabaseHandler = new PostgreSQLDatabaseHandler($databaseConnection);

    $insertingQuery = new InsertingQuery("links", "link", "short", $originalLink, $shortLink);

    $shortLink = $linkMaker->setLink($shortlinkLength);

    while ($shortLink == $PostgreSQLDatabaseHandler->processQuery($selectingQuery, "")) {

        $shortLink = $linkMaker->setLink($shortlinkLength);
    }

    $result = $PostgreSQLDatabaseHandler->processQuery($insertingQuery, "short");

    echo $domain . $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['url'])) {

    $shortLink = $_GET['url'];

    $query = new SelectingQuery("links", "link", "short", $shortLink);

    $PostgreSQLDatabaseHandler = new PostgreSQLDatabaseHandler($databaseConnection);

    $redirect = $PostgreSQLDatabaseHandler->processQuery($query, "");

    header("Location: $redirect");
}

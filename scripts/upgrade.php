#!/usr/bin/env php
<?php
require_once __DIR__ . '/../bootstrap.php';

// create the database (if necessary)
Database::create();

echo 'Connecting to the database&hellip;'.PHP_EOL;
$db = Record::getDB();
echo 'connected successfully!<br />'.PHP_EOL;

/**
 * 
 * Enter description here ...
 * @param mysqli $db
 * @param $sql
 * @param $message
 * @param $fail_ok
 */
function exec_sql($db, $sql, $message, $fail_ok = false)
{
    echo $message.'&hellip;'.PHP_EOL;
    $result = $db->multi_query($sql);
    if (!$result) {
        echo 'The query failed: ';
        echo $db->error;
        exit(1);
    }
    echo 'finished.<br />'.PHP_EOL;
}
exec_sql($db, file_get_contents(__DIR__ . '/../data/pearhunt.sql'), 'Initializing database structure');

echo 'Upgrade complete!';

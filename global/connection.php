<?php
$config = parse_ini_file('config.ini');
function db_connect()
{
    static $connection;
    global $config;
    if (!isset($connection)) {

        $connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbname']);
    }
    if ($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    return $connection;
}

function db_query($query)
{
    $connection = db_connect();
    $result = mysqli_query($connection, $query);
    return $result;
}


function db_select($query)
{
    $rows = array();
    $result = db_query($query);

    if ($result === false) {
        return false;
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function db_error()
{
    $connection = db_connect();
    return mysqli_error($connection);
}

function db_quote($value)
{
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection, $value) . "'";
}

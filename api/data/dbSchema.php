<?php
/**
 * Created by PhpStorm.
 * User: Sayem
 * Date: 31-Jan-19
 * Time: 9:06 AM
 *
 */
//create db first and then run schema

include "database.php";
$sql = file_get_contents("dbSchema_cleaned.sql");
$connection = Database::connect();
$connection->exec($sql);
Database::disconnect();

?>
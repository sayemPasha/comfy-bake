<?php
/**
 * Created by PhpStorm.
 * User: Sayem
 * Date: 31-Jan-19
 * Time: 8:51 AM
 */
include "database.php";
$sql = file_get_contents("insert.sql");
$connection = Database::connect();
$connection->exec($sql);
echo "Inserted.";
Database::disconnect();

?>
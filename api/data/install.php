<?php
/**
 * Created by PhpStorm.
 * User: Sayem
 * Date: 31-Jan-19
 * Time: 6:59 AM
 *
 * This script create new database in a deployment system
 */
include 'database.php';
Database::createDatabase("initDB.sql"); //only installer script.(i.e first time creating)
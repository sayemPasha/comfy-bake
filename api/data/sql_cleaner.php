<?php
/**
 * Created by PhpStorm.
 * User: Sayem
 * Date: 31-Jan-19
 * Time: 8:33 AM
 */


/*Why sql_cleaner?
 * When sql code is exported from phpmyadmin, it adds additional data
 * To get rid off - and / character and its' consecutive line,
 * just run the script.
 */
$filename = "dbSchema.sql";              //input file
$cleanedFileName                                //output file
    = substr($filename, 0,-4)."_cleaned.sql";

$string = file_get_contents($filename);         //read file
$array = explode("\n",$string);
foreach($array as $arr) {
    if(!empty($arr)) {
        if ($arr[0] != '-' && $arr[0] != '/') { //if you need to add additional filters, add here
            $output[] = $arr; //works like array_push(
        }
    }
}

$out = implode("\n",$output);
file_put_contents($cleanedFileName,$out);       //write file

echo "<strong>".$filename."</strong>"." is cleaned and saved in "."<strong>".$cleanedFileName."</strong>";
?>
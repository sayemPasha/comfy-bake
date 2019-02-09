<?php
/**
 * Created by PhpStorm.
 * User: Sayem
 * Date: 08-Feb-19
 * Time: 9:35 AM
 */

/*
The product ID 106, is just an example.
You need to specify a product ID that exists in your database.

If you specify an ID that does not exist in the database, it might still say
product was updated. It does not update anything on the database
but the query was executed successfully without any syntax errors.

To prevent this, you need an extra validation where you check if an ID exists in the database.
 This feature is not yet implemented.
 */

/* JSON TO BE EMBEDDED
{
    "id" : "106"
}
*/
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../data/database.php';
include_once '../objects/product.php';

// get database connection

$db = Database::connect();

// prepare product object
$product = new Product($db);

// get product id
$data = json_decode(file_get_contents("php://input"));

// set product id to be deleted
$product->id = $data->id;

// delete the product
if($product->delete()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Product was deleted."));
}

// if unable to delete the product
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to delete product."));
}
?>
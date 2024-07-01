<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//include_once '..\modelo\Database.php';
//include_once '..\controlador\Items.php';

//include_once 'baseDatabase.php';
//include_once 'baseItems.php';

include_once 'Database.php';
include_once 'Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

//echo "Hola Mundo!"; 
$data = json_decode(file_get_contents("php://input"));

//echo "\n";
// simulo el ingreso de datos
//$data = '{
//    "name": "Producto A",
//    "description": "Descripción del Producto A",
//    "price": 49,
//    "category_id": 123,
//    "created": "2024-06-29 12:00:00"
//}';
//echo "\n";
//var_dump($data);
//echo "\n";

if(!empty($data->name) && !empty($data->description) &&
!empty($data->price) && !empty($data->category_id) 
//&& !empty($data->created)
){

$items->name = $data->name;
$items->description = $data->description;
$items->price = $data->price;
$items->category_id = $data->category_id; 
$items->created = date ('Y-m-d H:i:s'); 

//echo "Hola Mundo!"; 
//var_dump($items);

if($items->create()){ 
http_response_code(201); 
echo json_encode(array("message" => "Item was created."));
} else{ 
http_response_code(503); 
echo json_encode(array("message" => "Unable to create item."));
}
}
else{ 
http_response_code(400); 
echo json_encode(array("message" => "Unable to create item. Data is incomplete."));
}
?>
<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../modelo/Database.php';
include_once '../controlador/Items.php';

$database = new Database();
$db = $database->getConnection();

$items = new Items($db);

$id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : null;


$result = $items->read($id); 

if ($result->num_rows > 0) {
  $itemRecords = array();
  $itemRecords["items"] = array();

  while ($item = $result->fetch_assoc()) {
    $itemDetails = array(
      "id" => $item['id'],
      "name" => $item['name'],
      "description" => $item['description'],
      "price" => $item['price'],
      "category_id" => $item['category_id'],
      "created" => $item['created'],
      "modified" => $item['modified'],
    );
    array_push($itemRecords["items"], $itemDetails);
  }

  http_response_code(200);
  echo json_encode($itemRecords);
} else {
  http_response_code(404);
  echo json_encode(array("message" => "No item found."));
}

?>
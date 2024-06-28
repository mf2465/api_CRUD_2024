<!doctype html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>api_CRUD2024_Tecno3F</title>
  
</head>
  
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php 
require '../pages/menunav.php'; 
?> 

<main>


<!--  inicio Importante -->

<div class="container">
      
    <div class="row text-center">
        <h1>LISTADO DE PRODUCTOS</h1>
        <p>Vista JSON</p>
        <br>
    </div>

</div>

<!--  fin Importante -->

<!--  read original -->
<?php

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

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

</main>

<br>
<br>
<?php 
require '../pages/footer.php'; 
?>

</body>

</html>


<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Clase Database y Items
include_once 'baseDatabase.php';
include_once 'baseItems.php';

// Crear instancia de Database
$database = new Database();
$conn = $database->getConnection();

// Crear instancia de Items
$items = new Items($conn);

// Verificar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $category_id = $_POST['category_id'] ?? '';

    // Depurar los datos recibidos usando var_dump
    var_dump($_POST);

    // Validar datos (por ejemplo, verificar que no estén vacíos)
    if (!empty($name) && !empty($description) && !empty($price) && !empty($category_id)) {
        // Intentar crear el ítem utilizando la instancia de Items
        $created = date('Y-m-d H:i:s'); // Fecha de creación actual
        if ($items->create($name, $description, $price, $category_id, new DateTime($created))) {
            http_response_code(201); // Created
            echo json_encode(array("message" => "Item was created."));
        } else {
            http_response_code(503); // Service Unavailable
            echo json_encode(array("message" => "Unable to create item."));
        }
    } else {
        http_response_code(400); // Bad Request
        echo json_encode(array("message" => "Unable to create item. Data is incomplete."));
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed."));
}
?>

<?php
// Datos para la inserción

$name = '[articulo]';
$description = '[detalle del producto]';
$price = '[15]';
$category_id = '[88]';
$created = '[2019-06-01 09:12:26]';
$modified = '[2023-06-01 10:12:26]';

// Conexión a la base de datos (ejemplo con PDO)
try {
    $db = new PDO('mysql:host=localhost;id22362038_rest_api_demo', 'id22362038_apicrud2024', 'Costamar393');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Sentencia SQL para la inserción
    $sql = "INSERT INTO `items`(`name`, `description`, `price`, `category_id`, `created`, `modified`) 
            VALUES (:name, :description, :price, :category_id, :created, :modified)";

    // Preparar la consulta
    $stmt = $db->prepare($sql);

    // Asignar parámetros
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':modified', $modified);

    // Ejecutar la consulta
    $stmt->execute();

    // Mostrar mensaje de éxito
    echo "Nuevo registro insertado correctamente.";

} catch(PDOException $e) {
    // Manejo de errores
    echo "Error al insertar el registro: " . $e->getMessage();
}
?>

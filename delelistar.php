<?php
// URL del archivo read.php
$url = 'https://apicrud2024.000webhostapp.com/vista/read-base-ok.php';

// Obtener el JSON desde read.php
$json = file_get_contents($url);

// Decodificar el JSON a un arreglo asociativo
$data = json_decode($json, true);

// Verificar si se obtuvo correctamente el JSON
$items = [];
if ($data && isset($data['items']) && is_array($data['items'])) {
    $items = $data['items'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Listado de Productos</h2>
        <table class="table align-middle">
            <thead>
                <tr class="table-warning">
                    <th scope="col">#id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Modificado</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id']); ?></td>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['description']); ?></td>
                        <td><?php echo htmlspecialchars($item['price']); ?></td>
                        <td><?php echo htmlspecialchars($item['category_id']); ?></td>
                        <td><?php echo htmlspecialchars($item['created']); ?></td>
                        <td><?php echo htmlspecialchars($item['modified']); ?></td>
                        <td>
                            <a href="<?php echo htmlspecialchars($item['id']); ?>" class="btn btn-outline-primary">Editar</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteItem(<?php echo $item['id']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteItem(id) {
            if (confirm('¿Estás seguro de eliminar este item?')) {
                fetch('https://apicrud2024.000webhostapp.com/vista/delete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    alert('Item eliminado correctamente');
                    // Aquí podrías recargar la lista de items o actualizar la interfaz según necesites
                    location.reload(); // Recarga la página para actualizar la lista
                })
                .catch(error => {
                    console.error('Error al eliminar el item:', error);
                    alert('Ocurrió un error al intentar eliminar el item');
                });
            }
        }
    </script>
</body>
</html>

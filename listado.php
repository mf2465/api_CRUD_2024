<?php
// URL del archivo read.php
$url = 'https://apicrud2024.000webhostapp.com/vista/read-base-ok.php';

// Obtener el JSON desde read.php
$json = file_get_contents($url);

// Decodificar el JSON a un arreglo asociativo
$data = json_decode($json, true);

// Verificar si se obtuvo correctamente el JSON
if ($data && isset($data['items']) && !empty($data['items'])) {
    $items = $data['items'];
} else {
    $items = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>


    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>api_CRUD2024_Tecno3F</title>

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
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['description']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['category_id']; ?></td>
                    <td><?php echo $item['created']; ?></td>
                    <td><?php echo $item['modified']; ?></td>
                    <td><button type="button" disabled="disabled" class="btn btn-outline-primary"><?php echo"<a href='editar.php?id=".$item['id']."'>" ?>Editar</button>
			        </td>
			        <td><button type="button" disabled="disabled" class="btn btn-outline-danger"><?php echo"<a href='eliminar.php?id=".$item['id']."'>" ?>Eliminar</button>
			        </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>
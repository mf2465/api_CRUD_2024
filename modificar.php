<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>api_CRUD2024_Tecno3F</title>
</head>
<body>
    <?php require 'pages/menunav.php'; ?>
    <main>
        <div class="container">
            <?php
            // Inicialización de variables de conexión a la base de datos
            $host = "localhost";
            $user = "id22362038_rest_api_demo";
            $pass = "Costamar393$";
            $DB = "id22362038_rest_api_demo";
            $tabla1 = "items";

            // Conexión a la base de datos
            $conexion = mysqli_connect($host, $user, $pass, $DB);
            if (mysqli_connect_errno()) {
                echo "Error de conexión a Base de Datos : " . mysqli_connect_error();
                exit();
            }

            // Verificar si se ha enviado un ID válido mediante GET y es numérico
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];

                // Consulta SQL para obtener los datos del registro por ID
                $sql = "SELECT * FROM $tabla1 WHERE id = $id";
                $resultado = $conexion->query($sql);

                // Verificar si la consulta devuelve resultados
                if ($resultado->num_rows > 0) {
                    $row = $resultado->fetch_assoc();
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $category_id = $row['category_id'];
                    $created = $row['created'];
                    $modified = $row['modified'];

                    // Procesar el formulario de edición
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Obtener los nuevos valores del formulario
                        $name_update = $_POST['name'];
                        $description_update = $_POST['description'];
                        $price_update = $_POST['price'];
                        $category_id_update = $_POST['category_id'];
                        date_default_timezone_set('America/Argentina/Buenos_Aires');
                        $modified = date('Y-m-d H:i:s');

                        // Actualizar el registro en la base de datos
                        $sql_update = "UPDATE $tabla1 SET name='$name_update', description='$description_update', price='$price_update', category_id='$category_id_update', modified='$modified' WHERE id=$id";

                        if ($conexion->query($sql_update) === TRUE) {
                            echo "<h1><br></h1>";
                            echo '<div id="success-alert" class="alert alert-success text-center" role="alert">Registro actualizado exitosamente.<br> En instantes será redirigido a INICIO.</div>';
                            // Redirigir a una página específica después de 3 segundos
                            echo '<script>window.setTimeout(function() { document.getElementById("success-alert").style.display = "none"; window.location.href = "https://apicrud2024.000webhostapp.com/"; }, 3000);</script>';
                            exit; // Terminar el script después de la redirección
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error al modificar el registro: ' . $conexion->error . '</div>';
                        }
                    }

                    // Liberar el resultado
                    $resultado->free();
                } else {
                    echo '<div class="alert alert-warning" role="alert">No se encontró ningún registro con el ID: ' . $id . '</div>';
                }
            } else {
                echo '<div class="alert alert-warning" role="alert">ID no válido o no se ha proporcionado.</div>';
            }

            // Cerrar la conexión a la base de datos
            $conexion->close();
            ?>
            <h1></h1>
            <!-- Formulario con los campos prellenados -->
            <div class="form" id="ingresar">
                <h2 class="text-center">Formulario de modificación Item # <?php echo htmlspecialchars($id); ?></h2>
                <p class="text-center">Complete los campos que desee actualizar en la Base de Datos</p>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="6" required><?php echo htmlspecialchars($description); ?></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="price" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
                        </div>
                        <div class="col">
                            <label for="category_id" class="form-label">Nro. de Categoría</label>
                            <input type="number" class="form-control" id="category_id" name="category_id" value="<?php echo htmlspecialchars($category_id); ?>" required>
                        </div>
                    </div>
                    <!-- Campo oculto para pasar el ID -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning btn-lg">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
        <h2></h2>
    </main>
    <?php require 'pages/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

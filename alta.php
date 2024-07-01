<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para Crear Item</title>
</head>
<body>
    <h2>Crear Nuevo Item</h2>
    <form id="itemForm" method="POST" action="https://apicrud2024.000webhostapp.com/vista/create.php" onsubmit="return validateForm()">
        
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <label for="price">Precio:</label><br>
        <input type="number" id="price" name="price" required><br><br>

        <label for="category_id">ID de Categoría:</label><br>
        <input type="number" id="category_id" name="category_id" required><br><br>

        <input type="submit" value="Crear Item">
    </form>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var description = document.getElementById('description').value;
            var price = document.getElementById('price').value;
            var category_id = document.getElementById('category_id').value;

            // Mostrar los datos en un alert
            var message = "Nombre: " + name + "\n" +
                          "Descripción: " + description + "\n" +
                          "Precio: " + price + "\n" +
                          "ID de Categoría: " + category_id;

            alert(message);



            if (name.trim() == '') {
                alert('Por favor ingrese un nombre.');
                return false;
            }

            if (description.trim() == '') {
                alert('Por favor ingrese una descripción.');
                return false;
            }

            if (isNaN(price) || parseInt(price) <= 0) {
                alert('Por favor ingrese un precio válido mayor que cero, sin comas, es decir entero.');
                return false;
            }

            if (isNaN(category_id) || parseInt(category_id) <= 0) {
                alert('Por favor ingrese un ID de categoría válido mayor que cero.');
                return false;
            }

            return true; // Envía el formulario si todas las validaciones pasan
        }
    </script>
</body>
</html>

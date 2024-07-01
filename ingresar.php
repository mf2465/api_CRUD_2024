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
require 'pages/menunav.php'; 
?> 

<main>

<!--  inicio Formulario -->

<div class="form" id="ingresar">
    
  <div class="container">
      
    <div class="row text-center">
        <h2><br></h2>
        <h2>Formulario de alta ITEM</h2>
        <p>Complete todos los campos para proceder su ingreso a la Base de Datos</p>
        <h2></h2>
    </div>
    
    <form action="new.php" method="post">
        
      <div class="row mb-3">
          
        <div class="col">
        <input type="text" class="form-control" placeholder="Nombre" aria-label="name" name="name" required>
        </div>
       
      </div>
      
      <div class="row mb-3">
        
        <div class="col">
        <textarea class="form-control" placeholder="Descripción" cols="20" rows="6" aria-label="description" name="description" required></textarea>
      </div>
        
      </div>
      
      <div class="row mb-3">
          
        <div class="col">
        <input type="number" class="form-control" placeholder="Precio" aria-label="price" name="price" required>
        </div>
   
        <div class="col">
        <input type="number" class="form-control" placeholder="Nro. de Categoría" aria-label="category_id" name="category_id" required>
        </div>
   
      </div>
      
      <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
      </div>
    </form>
    
  </div>

  <!--  fin Formulario -->

<br>
<br>
<?php 
require 'pages/footer.php'; 
?>

</body>

</html>
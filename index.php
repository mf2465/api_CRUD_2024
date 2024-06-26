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

<!--  inicio Consigna -->

<div class="carousel card mb-5 bg-dark text-white" style="max-width: 1920;" id="consigna">
  
  <div class="row no-gutters">
    <div class="col-md-1">
    </div>
    <div class="col-md-3">
    <img src="img/PHP-logo.png" class="card-img" alt="...">
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-6">
      
      <div class="card-body">
        
        <h3 class="card-title">CONSIGNA</h3>
        
        <p class="card-text">Se deberá crear un CRUD con LOGIN usando una API establecida.<br>Si el trabajo se hace en grupos de más de 4 integrantes, agregar la parte de FRONT.<br>La fecha de entrega será hasta el 02/07/2024 a las 23:59hs.</p>
        
          <button type="button" class="btn btn-outline-secondary border-white text-white-50btn-lg text-white">Conocé el temario del curso</button>
      </div>

    </div>
  
  </div>

</div> 

<!--  fin Consigna -->

<!--  inicio Importante -->

<div class="container">
      
    <div class="row text-center">
        <h6>IMPORTANTE</h6>
        <p>Para realizar modificaciones al listado de Productos es necesario Loguearse</p>
    </div>

</div>

<!--  fin Importante -->

</main>

<br>
<br>
<?php 
require 'pages/footer.php'; 
?>

</body>

</html>


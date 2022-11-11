<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick & Morty</title>
    <link rel="icon" href="IMG/icono.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">
</head>
<body class="bg-theme">
    
<nav class="navbar navbar-expand-lg bg-black mb-4 bd-navbar sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="IMG/navbar.webp" width="80" class="d-inline-block align-text-top">    
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
        <li class="nav-item">
          <h4><a class="nav-link active fw-bold text-light" aria-current="page" href="index.php">Inicio</a></h4>
        </li>
        <li class="nav-item">
          <h4><a class="nav-link active fw-bold text-light" aria-current="page" href="personajes.php">Personajes</a></h4>
        </li>
        <li class="nav-item">
          <h4><a class="nav-link active fw-bold text-light" aria-current="page" href="capitulos.php">Capitulos</a></h4>
        </li>
    </div>
  </div>
</nav>
 
    <div class="col">
                    <h1 class="m-auto text-light text-center fw-bold mb-5"><em>Personajes de Rick And Morty</em></h1>
                </div>
    <div class="container d-flex flex-wrap justify-content-between gap-3">

            <?php
            function TodosLosPersonajes($num){
              $consumir = curl_init();
              curl_setopt($consumir, CURLOPT_URL, "https://rickandmortyapi.com/api/character/?page=$num");
              curl_setopt($consumir, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($consumir, CURLOPT_HEADER, 0);
              $data = curl_exec($consumir);
              curl_close($consumir);
              $episodes = json_decode($data);
          
              foreach($episodes->results as $character){
                  echo 
                  "
                   <div style='max-width:315px; min-width:315px;'>
                      <button class='btn bg-card2 mb-4' type='button' data-bs-toggle='collapse' data-bs-target=#target$character->id aria-expanded='false' aria-controls=target$character->id>
                       <img src='$character->image'>
                         </button>
                           <div class='collapse mb-4 ' id=target$character->id>
                              <div class='card card-body bg-text'>
                                 <h3 class='card-title text-center fw-bold text-light mt-1 p-2'> $character->name</h3>
                                 <em><p class='card-text text-center h5 text-light'>ID: $character->id</p></em>
                                   <em><p class='card-text text-center h5 text-light'>Estado: $character->status</p></em>
                                   <em><p class='card-text text-center h5 text-light'>Genero: $character->gender</p></em>
                                   <em><p class='card-text text-center h5 text-light mb-3'>Especie: $character->species</p></em>
                      </div>
                   </div>
                  </div>
                  ";
              }
            }

            for($i = 1; $i <= 42; $i++){
              TodosLosPersonajes($i);
            }
            
              
            
            ?>

    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
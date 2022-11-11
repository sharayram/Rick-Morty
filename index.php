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

<body style="background-image:url(https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Color_negro.jpg/1200px-Color_negro.jpg); background-size:cover;">
    
<nav class="navbar navbar-expand-lg bg-black mb-4 bd-navbar sticky-top Navegador">
  <div class="container-fluid">
  <a href="index.php"><img src="IMG/navbar.webp" width="80" class="d-inline-block align-text-top ms-4 me-5"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
        <li class="nav-item">
          <h4><a class="nav-link active fw-bold text-light me-2" aria-current="page" href="index.php">Inicio</a></h4>
        </li>
        <li class="nav-item">
          <h4><a class="nav-link active fw-bold text-light me-2" aria-current="page" href="personajes.php">Personajes</a></h4>
        </li>
        <li class="nav-item">
          <h4><a class="nav-link active fw-bold text-light me-2" aria-current="page" href="capitulos.php">Capítulos</a></h4>
        </li>
    </div>
  </div>
</nav>
 
<div class="container">
        <div class="col mb-5">
                <h1 class="m-auto text-light text-center fw-bold"><em>Personajes de Temporada 1</em></h1>
            </div>
            <div class="container">
        <div class="row">
            <div class="col-9 d-flex flex-wrap justify-content-around">
            <?php
            $consumir = curl_init();
            curl_setopt($consumir, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/1");
            curl_setopt($consumir, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($consumir, CURLOPT_HEADER, 0);
            $data = curl_exec($consumir);
            curl_close($consumir);
            $episodes = json_decode($data);
        
            foreach($episodes->characters as $value){
                $chs = curl_init();
                curl_setopt($chs, CURLOPT_URL, $value);
                curl_setopt($chs, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($chs, CURLOPT_HEADER, 0);
                $datas = curl_exec($chs);
                curl_close($chs);
                $personajes = json_decode($datas);
                echo 
                "
                <div class='mb-5'>
                <div class='col'>
                <div clas='card mb-3'>
                <img src='$personajes->image' class='card-img-top rounded-top color'>
                    <div class=' card-body bg-characters rounded-bottom p-3'>
                        <h3 class='card-title text-center text-light mt-1 mb-3'> $personajes->name</h3>
                        <em><p class='card-text text-center text-light h5'>Estado: $personajes->status</p></em>
                        <em><p class='card-text text-center text-light h5'>Genero: $personajes->gender</p></em>
                        <em><p class='card-text text-center text-light h5'>Especie: $personajes->species</p></em>
                    </div>
                </div>
            </div>
                </div>
                
                ";
            }
            ?>
            </div>
            
            <div class="col-3">
            <?php
                $p1 = rand(1, 826);
                $p2 = rand(1, 826);
                $p3 = rand(1, 826);
               $con = curl_init();
               curl_setopt($con, CURLOPT_URL, "https://rickandmortyapi.com/api/character/"."[".$p1.", ".$p2.", ".$p3."]");
               curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($con, CURLOPT_HEADER, 0);
               $data = curl_exec($con);
               $episodes = json_decode($data); 
               curl_close($con);

               foreach($episodes as $episode){
                echo "
                <div class='mb-5'>
                <div clas='card mb-5'>
                <img src='$episode->image' class='card-img-top rounded-top color'>
                    <div class=' card-body bg-characters2 rounded-bottom p-3'>
                        <h3 class='card-title text-center text-light mt-1 mb-3'> $episode->name</h3>
                        <em><p class='card-text text-center text-light h5'>Estado: $episode->status</p></em>
                        <em><p class='card-text text-center text-light h5'>Genero: $episode->gender</p></em>
                        <em><p class='card-text text-center text-light h5'>Especie: $episode->species</p></em>
                    </div>
                </div>
                </div>
                ";
            }
            ?>
            </div>
            
        </div>
    </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes de Capitulo</title>
    <link rel="icon" href="IMG/icono.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">
</head>
<body style="background-image:url(https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Color_negro.jpg/1200px-Color_negro.jpg); background-size:cover;">
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

    <em><h1 class="text-center text-light fw-bold">Personajes de Capitulo</h1></em>
    <div class="container">
        <div class="row">
        <?php
        $epis=$_GET['episodio'];

        $consumir = curl_init();
        curl_setopt($consumir, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/$epis");
        curl_setopt($consumir, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($consumir, CURLOPT_HEADER, 0);
        $data = curl_exec($consumir);
        curl_close($consumir);
        $episodes = json_decode($data);

        foreach($episodes->characters as $character)
        {
            $cons = curl_init();
        curl_setopt($cons, CURLOPT_URL, $character);
        curl_setopt($cons, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cons, CURLOPT_HEADER, 0);
        $data = curl_exec($cons);
        curl_close($cons);
        $characters = json_decode($data);
            echo 
            "
                <div class='col-3 mt-5'>
                <div class='card'>
                <div class='card card-body bg-text'>
                <img src='$characters->image'>
                <h3 class='card-title text-center fw-bold text-light mt-1 p-2'> $characters->name</h3>
                <em><p class='card-text text-center h5 text-light'>ID: $characters->id</p></em>
                <em><p class='card-text text-center h5 text-light'>Estado: $characters->status</p></em>
                <em><p class='card-text text-center h5 text-light'>Genero: $characters->gender</p></em>
                <em><p class='card-text text-center h5 text-light mb-3'>Especie: $characters->species</p></em>
                </div>
                </div>
                </div>
            ";
        }
    ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
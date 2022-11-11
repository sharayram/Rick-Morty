<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capitulos</title>
    <link rel="icon" href="IMG/icono.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles.css">
</head>
<body class="bg-theme">
<nav class="navbar navbar-expand-lg bg-black mb-4 bd-navbar sticky-top">
  <div class="container-fluid">
  <a href="index.php"><img src="IMG/navbar.webp" width="80" class="d-inline-block align-text-top"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
        <li class="nav-item">
          <h4><a class="nav-link active fw-bold text-light pe-4" aria-current="page" href="index.php">Inicio</a></h4>
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
      <h1 class="m-auto text-light text-center fw-bold"><em>Capitulos de Rick & Morty</em></h1>
    </div>

      <?php
function TodosLosCapitulos($num){
  $episodes = json($num);
  $eps = $episodes->results;

  foreach($eps as $episode){
/*         echo "<form action='personajeps.php' method='get'>";
        echo "<h3 class='card-title text-center mt-1 mb-3'> $episode->name</h3>";
        echo "<h3></h3>";
        echo "<input type='text' name='episodio' hidden value=$episode->id>";
        echo "<input type='submit'>";
        echo "</form>"; */

        echo 
                "
                <div class='container'>
                <div class='mt-5'>
                <div class=''>
                <div clas='card mb-3'>
                    <div class=' card-body bg-characters rounded-bottom p-3'>
                        <h3 class='card-title text-center text-light mt-1 mb-3'> $episode->id</h3>
                        <em><p class='card-text text-center text-light h5'>Nombre: $episode->name</p></em>
                        <em><p class='card-text text-center text-light h5'>Fecha: $episode->air_date</p></em>
                        <em><p class='card-text text-center text-light h5'>Capitulo: $episode->episode</p></em>
                        <div class='col-12'>
                          <form action='personajeps.php' method='get' class='col-12 mt-4 btn btn-success d-flex justify-content-around'>
                            <input type='text' name='episodio' hidden value=$episode->id placerholder='hola'>
                            <input type='submit' class='center col-12 btn btn-success' value='Mostrar Personajes del capitulo $episode->name'>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
                </div>

                
                
                ";
        
  }
}
function json($num){
  $consumir = curl_init();
  curl_setopt($consumir, CURLOPT_URL, "https://rickandmortyapi.com/api/episode/?page=$num");
  curl_setopt($consumir, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($consumir, CURLOPT_HEADER, 0);
  $data = curl_exec($consumir);
  curl_close($consumir);
  $episodes = json_decode($data);
  return $episodes;
}
?>

    
    <?php
      $Num = 0;
      if(isset($_GET["NumPag"])){
        $Num = $_GET["NumPag"];
      }
      else{
        $Num = 1;
      }
      
      TodosLosCapitulos($Num);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center flex-wrap justify-content-around mt-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center flex-wrap">
                        <?php
                          for ($i = 1; $i <= 3; $i++)
                              echo "<li class='page-item'>
                                      <form action='capitulos.php' method='get'>
                                        <input class='page-link' Type='submit' name='NumPag' value=$i>
                                      </form>
                                    </li>";
                                    
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
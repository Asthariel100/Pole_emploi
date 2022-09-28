<?php
namespace App;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pole Emploi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-primary bg-gradient p-5">
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>
    <title>Pôle Emploi recherche</title>
</head>

    <div class="container text-center p-5  bg-info">
      <h1 class="text-light">Pôle Emploi</h1>
    </div>
  <div class="container text-center p-4 bg-info">
    <form method="get">
      <div class="row text-center">
        <div class="col">
      <h1 class="text-light">Contrats</h1>
    <input type="hidden" name="p" value="1">
    <select class="form-select" name="filtre_contrat" >
    <option value="">Type de contrat</option>
    <option value="CDI">CDI</option>
    <option value="CDD">CDD</option>
    <option value="Interim">Interim</option>
    <option value="Formation">Formation</option>
    </select>
</div>
<div class="col">
<h1 class="text-light">Département</h1>
<input type="hidden" name="p" value="1">
<select class="form-select" name="filtre_departement">
    <option value="">Département</option>
    <option value="Gard">Gard</option>
    <option value="Lozere">Lozére</option>
    <option value="Alsace">Alsace</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Corse">Corse</option>
    <option value="Aquitaine">Aquitaine</option>
</select>

<input placeholder="search" name="search"></input>

</div>
</div>
</div>
<div class="container text-center bg-info p-3">
<button class="btn btn-primary btn-lg p-3 text-light shadow-lg" type="submit">Filtrer les annonces</button>
</div>
    </form>    
  <?php foreach($multis as $multi): ?> 
    <div class="container p-4 bg-secondary">
      <div class="card h-50 shadow-lg p-3">
        <div class="card-body border border-info border-5 p-3">
          <h3 class="card-title">Poste: <?= $multi->getTitre() ?></h3>
          <h4 class="card-title">Description: <?= $multi->getDescription() ?></h4>
          <h5 class="card-title">Salaire: <?= $multi->getSalaire() ?></h5>
          <a class="btn btn-primary shadow text-end" href="?page=single&id=<?= $multi->getId()?>">Consulter</a>
          <a class="btn btn-primary shadow d-none" href="?page=delete&id=<?= $multi->getId()?>">Supprimer</a>
        </div>
      </div>
    </div>   
  <?php endforeach ?>
<div class="container text-center p-3">  
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="index.php?p=<?= $page ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
  <?php  for($page = 1; $page<= $nbrDePages; $page++){
  echo '<li class="page-item"><a class="page-link" href="index.php?p='. $page .'&filtre_contrat='. $filtre_contrat .'&filtre_departement='. $filtre_departement .'">'. $page.'</a></li>';
  }?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</div>
</body>
</html>
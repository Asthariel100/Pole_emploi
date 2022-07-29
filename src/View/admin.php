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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>
    <title>Document</title>
</head>

    <div class="d-flex justify-items-center">
      <h1>Paul Emploi Occitanie</h1>
    </div>

    <form method="get">
      <div class="d-flex">
      <h1>Contrat: </h1>
    <input type="hidden" name="p" value="1">
    <select class="form-select" name="filtre_contrat" >
    <option value="">Type de contrat</option>
    <option value="CDI">CDI</option>
    <option value="CDD">CDD</option>
    <option value="Interim">Interim</option>
    <option value="Formation">Formation</option>
    </select>

<h1>Département: </h1>
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
<button class="btn btn-primary" type="submit">Filtrer</button>
</div>
    </form>
    <div>
  <?php foreach($multis as $multi): ?> 
      <div class="card h-50">
        <div class="card-body">
          <h3 class="card-title">Poste: <?= $multi->getTitre() ?></h3>
          <h4 class="card-title">Description: <?= $multi->getDescription() ?></h4>
          <h5 class="card-title">Salaire: <?= $multi->getSalaire() ?></h5>
          <p class="card-text"></p>
          <h5><a href="?page=single&id=<?= $multi->getId()?>">Consulter</a></h5>
          <h5><a href="?page=delete&id=<?= $multi->getId()?>">Supprimer</a></h5>
        </div>
      </div>
    </div>
    
  <?php endforeach ?>
  
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="index.php?page=admin&p=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
  <?php  for($page = 1; $page<= $nbrDePages; $page++){
  echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&p='. $page .'&filtre_contrat='. $filtre_contrat .'&filtre_departement='. $filtre_departement .'">'. $page.'</a></li>';
  }?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

  <h1>Ajoutez une Annonce</h1>
    <form method="post" action="?page=add">
        <input placeholder="Titre"name="titre"></input> 
        <input placeholder="Description"name="description"></input>
        <input placeholder="Salaire"name="salaire"></input>

            <select class="form-select" name="departement" >
                <option value="Département">Département</option>
                <option value="Gard">Gard</option>
                <option value="Lozere">Lozére</option>
                <option value="Alsace">Alsace</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Corse">Corse</option>
                <option value="Aquitaine">Aquitaine</option>
            </select>

            <select class="form-select" name="contrat">
                <option value="Type de contrat">Type de contrat</option>
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="Interim">Interim</option>
                <option value="Formation">Formation</option>
            </select>

        <input type="date" placeholder="Date"name="date"></input>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
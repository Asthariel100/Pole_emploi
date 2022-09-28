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
    <title>Annonce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="bg-primary bg-gradient p-5">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <div class="container bg-info p-5"> 
    <h1 class="text-light text-center">Annonce:</h1>
   
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title"><?= $single->getTitre() ?></h3>
          <h4 class="card-title"><?= $single->getDescription() ?></h4>
          <h5 class="card-title"><?= $single->getSalaire() ?></h5>
          <p class="card-text"></p>
          <h5><a href="?page=delete&id=<?= $single->getId()?>">Supprimer</a></h5> 
        </div>
      </div> 

      <?php foreach($multis as $multi): ?> 
        <div class="container p-4 bg-secondary">
          <div class="card h-50 shadow-lg p-3">
            <div class="card-body border border-info border-5 p-3">
              <h3 class="card-title">Nom d'utilisateur : <?= $multi->getUsername() ?></h3>
              <h4 class="card-title">Email : <?= $multi->getEmail() ?></h4>
              <h5 class="card-title">Commentaire : <?= $multi->getCommentaire() ?></h5>
            </div>
          </div>
        </div>   
      <?php endforeach ?>
</div>
<div class="text-center">
  <a class="text-white p-3" href="?page=admin">Retour Acceuil</a>
</div>
</body>
</html>
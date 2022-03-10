<?php
namespace App;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Annonce :</h1>
    <h5><a href="?page=delete&id=<?= $single->getId()?>">Supprimer</a></h5> 
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title"><?= $single->getTitre() ?></h3>
          <h4 class="card-title"><?= $single->getDescription() ?></h4>
          <h5 class="card-title"><?= $single->getSalaire() ?></h5>
          <p class="card-text"></p>
          <h5><a href="?page=single&id=<?= $single->getId()?>">Consulter</a></h5> 
        </div>
      </div>
    </div>
    <a href="?page=multi">Retour Acceuil</a>
</body>
</html>
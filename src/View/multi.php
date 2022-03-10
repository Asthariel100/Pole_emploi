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
    <h1>Paul Emploi Occitanie</h1>

    <form method="post">Contrat
    <input type="hidden" name="p" value="1">
    <select name="filtre_contrat" >
    <option value="">Type de contrat</option>
    <option value="CDI">CDI</option>
    <option value="CDD">CDD</option>
    <option value="Interim">Interim</option>
    <option value="Formation">Formation</option>
</select>

<form method="post">Département
<input type="hidden" name="p" value="1">
<select name="filtre_departement">
    <option value="">Département</option>
    <option value="Gard">Gard</option>
    <option value="Lozere">Lozére</option>
    <option value="Alsace">Alsace</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Corse">Corse</option>
    <option value="Aquitaine">Aquitaine</option>
</select>
<button type="submit">Filtrer</button>
    </form>
    <div class="row row-cols-1 row-cols-md-3 g-4">
  <?php foreach($multis as $multi): ?>
    <h5><a href="?page=delete&id=<?= $multi->getId()?>">Supprimer</a></h5>  
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title"><?= $multi->getTitre() ?></h3>
          <h4 class="card-title"><?= $multi->getDescription() ?></h4>
          <h5 class="card-title"><?= $multi->getSalaire() ?></h5>
          <p class="card-text"></p>
        </div>
      </div>
    </div>
    
  <?php endforeach ?>
  <?php for($page = 1; $page<= $nbrDePages; $page++) {  

echo '<a href = "index.php?p=' . $page . '">' . $page . ' </a>';  

}    

?> 

 
  


    <form method="post" action="?page=add">
        <input placeholder="Titre"name="titre"></input> 
        <input placeholder="Description"name="description"></input>
        <input placeholder="Salaire"name="salaire"></input>

            <select name="departement" >
                <option value="Département">Département</option>
                <option value="Gard">Gard</option>
                <option value="Lozere">Lozére</option>
                <option value="Alsace">Alsace</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Corse">Corse</option>
                <option value="Aquitaine">Aquitaine</option>
            </select>

            <select name="contrat">
                <option value="Type de contrat">Type de contrat</option>
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="Interim">Interim</option>
                <option value="Formation">Formation</option>
            </select>

        <input placeholder="Date"name="date"></input>
        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
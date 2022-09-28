<?php
namespace App\Controller;

use App\Model\SingleModel;
use App\Model\PostulantModel;
use App\Controller\AbstractController;

class SingleController extends AbstractController
{

    public function addPostulantForm(){

        $username = $_POST["username"];
        $email = $_POST["email"];
        $commentaire = $_POST["commentaire"];
        $annonce_id = $_POST["annonce_id"];

        $add = new PostulantModel();
        $add->addPostulant( $username, $email, $commentaire, $annonce_id);
        header('Location: ?page=multi');
        }
}
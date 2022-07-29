<?php
namespace App\Controller;

use App\Model\MultiModel;
use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    
    public function index()
    {
        $multiModel = new MultiModel();
        if (!isset ($_GET['p']) ) {  
            $page = 1;  
        } else {  
            $page = $_GET['p'];  
        } 
        if (isset ($_POST['filtre_contrat']) ) {  
            $filtre_contrat = $_POST['filtre_contrat']; 
            $page = $_POST["p"];}
            elseif(isset ($_GET['filtre_contrat'])){
                $filtre_contrat= $_GET["filtre_contrat"];
            }else {  
            $filtre_contrat = null; 
        } 
        if (isset ($_POST['filtre_departement']) ) {  
            $filtre_departement = $_POST['filtre_departement']; 
            $page = $_POST["p"];}
            elseif(isset ($_GET['filtre_departement'])){
                $filtre_departement= $_GET["filtre_departement"];
            }else {  
            $filtre_departement = null; 
        } 
        
        $id = $multiModel->getId();
        $multis = $multiModel->findAll($page, $filtre_contrat, $filtre_departement);
        $nbrDePages = $multiModel->getNbrDePages();
        $this->render('admin.php', [
            'multis' => $multis,
            'nbrDePages'=> $nbrDePages,
            'filtre_contrat' => $filtre_contrat,
            'filtre_departement' => $filtre_departement,
            'id'=> $id
        ]);
    }

    public function one(){

        $id = $_GET["id"];
        $one = new  MultiModel();
        $single = $one->findOne($id);
        $this->render('single.php', [   
            'single'=> $single,
        ]);
    }

    public function delete(){
        $id = $_GET["id"];
        $delete = new MultiModel(); 
        $delete->deleteProduct($id);
        header('Location: ?page=multi');
        }
           
    public function add(){

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $salaire = $_POST["salaire"];
    $departement = $_POST["departement"];
    $contrat = $_POST["contrat"];
    $date = $_POST["date"];
    
    $add = new MultiModel();
    $add->addProduct( $titre, $description, $salaire, $contrat, $date, $departement);
    header('Location: ?page=multi');
    }
}
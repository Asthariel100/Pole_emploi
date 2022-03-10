<?php
namespace App\Model;

use PDO;
use App\database\Database;


class MultiModel{
    public $id;

    protected $titre;

    protected $description;

    protected $salaire;

    protected $pdo;
    
    protected $nbrDePages;

    const TABLE_NAME = 'annonce';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function findAll($page=1, $contrat =null, $lieu=null)
    { 
        $nbElements = 'SELECT 
                COUNT(`id`)
                FROM ' . self::TABLE_NAME .'
        ';
        $pdoStatement = $this->pdo->query($nbElements);
        $nbElements = $pdoStatement->fetchColumn();
        $limit = 4; 
        $offset = ($page-1) * $limit;
        $nbrDePages = ceil($nbElements/$limit);
        $this->nbrDePages = $nbrDePages;

        $contratRequete = "";
        if (!empty($contrat)){
            
            $contratRequete = " WHERE `contrat` LIKE '" .$contrat."'";
        }
        $lieuRequete = "";
        if(!empty($lieu)){

            $lieuRequete = " AND `departement` LIKE '" .$lieu."'";

        }

        $sql = "SELECT
                `id`
                ,`titre`
                ,`description`
                ,`salaire`
                FROM " . self::TABLE_NAME ."
                $contratRequete 
                $lieuRequete
                ORDER BY `date` ASC 
                LIMIT " .$limit. "
                OFFSET " .$offset . ";
        ";
        var_dump($sql);
        $pdoStatement = $this->pdo->query($sql);
        
        
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $result;

        
    
    }


    public function deleteProduct($id) {
        $sql = 
            'DELETE FROM ' . self::TABLE_NAME .' 
            WHERE id = :id'
        ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


    public function addProduct($titre, $description, $salaire, $contrat, $date, $departement)
    {
       
        $sql = "INSERT INTO " . self::TABLE_NAME . "
                (`titre`, `description`, `salaire`, `contrat`, `date`, `departement` )
                VALUES ('$titre', '$description', '$salaire','$contrat','$date','$departement')";
  
                $pdoStatement = $this->pdo->prepare($sql);
        
        $result = $pdoStatement->execute();
         
     
    
        if (!$result) {
            return false;
        }
    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of salaire
     */ 
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set the value of salaire
     *
     * @return  self
     */ 
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get the value of nbrDePages
     */ 
    public function getNbrDePages()
    {
        return $this->nbrDePages;
    }

    /**
     * Set the value of nbrDePages
     *
     * @return  self
     */ 
    public function setNbrDePages($nbrDePages)
    {
        $this->nbrDePages = $nbrDePages;

        return $this;
    }
}


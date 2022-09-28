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

    public function findAll($page = 1, $contrat =null, $lieu=null, $search=null)
    { 

    $contratRequete="" ; 
    $lieuRequete=""; 
    $searchInfo="";
 

        if (!empty($contrat)){
        
            $contratRequete = "AND `contrat` LIKE '$contrat'";
        }   
        if(!empty($lieu)){
                $lieuRequete = "AND `departement` LIKE '" .$lieu."'";
        
        }
        if (!empty($search))
        {           
            
                $searchInfo= "AND `titre` LIKE '$search%'";               
        }
        

            $nbElements = "SELECT 
                    COUNT(`id`) 
                    FROM " . self::TABLE_NAME ."
                    WHERE  `date` <= NOW() -INTERVAL 30 DAY
                    $searchInfo
                    $contratRequete
                    $lieuRequete";
                    $date = "DESC";

            $pdoStatement = $this->pdo->query($nbElements);
            $nbElements = $pdoStatement->fetchColumn();

            $limit = 4; 
            $offset = ($page - 1) * $limit;
            $nbrDePages = ceil($nbElements/$limit);
            $this->nbrDePages = $nbrDePages;
            $sql = "SELECT
                    `id`
                    ,`titre`
                    ,`description`
                    ,`salaire`
                    ,`date`
                    ,`departement`
                    ,`contrat`
                    FROM " . self::TABLE_NAME ."                    
                    WHERE  `date` <= NOW() -INTERVAL 30 DAY 
                    $contratRequete  
                    $lieuRequete 
                    $searchInfo     
                    ORDER BY `date` $date 
                    LIMIT " .$limit. "
                    OFFSET " .$offset . ";
            ";
        $pdoStatement = $this->pdo->query($sql);         
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;  
    }

    public function findOne($id){
        $this->$id =$id;
        $currentId = " WHERE `id` LIKE '" .$id."'";

        $sql = "SELECT
                `id`
                ,`titre`
                ,`description`
                ,`salaire`
                ,`date`
                FROM " . self::TABLE_NAME ."
                $currentId            
        ";
        $pdoStatement = $this->pdo->query($sql);
        
        $result = $pdoStatement->fetchObject(self::class);
       
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
                (`titre`, `description`, `salaire`, `contrat`, `date`, `departement`)
                VALUES ('$titre', '$description', '$salaire','$contrat','$date','$departement')";
  
                $pdoStatement = $this->pdo->prepare($sql);
        
        $result = $pdoStatement->execute();
         
     
    
        if (!$result) {
            return false;
        }
    }

    public function getDate()
    {
        return $this->date;

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

            /**
             * Get the value of page
             */ 
            public function getPage()
            {
                        return $this->page;
            }

            /**
             * Set the value of page
             *
             * @return  self
             */ 
            public function setPage($page)
            {
                        $this->page = $page;

                        return $this;
            }
}


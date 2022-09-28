<?php
namespace App\Model;

use PDO;
use App\database\Database;


class PostulantModel{

protected $id;

protected $username;

protected $email;

protected $commentaire;

protected $pdo;

protected $annonce_id;

const TABLE_NAME = 'postulant';

public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function addPostulant($username, $email, $commentaire, $annonce_id)
    {
       
        $sql = "INSERT INTO " . self::TABLE_NAME . "
                (`username`, `email`, `commentaire`, `annonce_id`)
                VALUES ('$username', '$email', '$commentaire','$annonce_id')";

                $pdoStatement = $this->pdo->prepare($sql);
        
        $result = $pdoStatement->execute();
             
        if (!$result) {
            return false;
        }
    }

    public function findAll($id)
    { 
    $page=1;
    $contratRequete="" ; 
    $lieuRequete=""; 
 
            $nbElements = "SELECT 
                    COUNT(`id`) 
                    FROM " . self::TABLE_NAME ."
                    $contratRequete
                    $lieuRequete";
            
            $pdoStatement = $this->pdo->query($nbElements);
            $nbElements = $pdoStatement->fetchColumn();
            $limit = 10; 
            $offset = ($page - 1) * $limit;
            $nbrDePages = ceil($nbElements/$limit);
            $this->nbrDePages = $nbrDePages;

            $currentId = " WHERE `annonce_id` LIKE '" .$id."'";

            $sql = "SELECT
                    `id`
                    ,`username`
                    ,`email`
                    ,`commentaire`
                    FROM " . self::TABLE_NAME ." 
                    $currentId          
                    LIMIT " .$limit. "
                    OFFSET " .$offset . ";
            ";
        $pdoStatement = $this->pdo->query($sql);         
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;  
    }


/**
 * Get the value of id
 */ 
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
 * Get the value of username
 */ 
public function getUsername()
{
return $this->username;
}

/**
 * Set the value of username
 *
 * @return  self
 */ 
public function setUsername($username)
{
$this->username = $username;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of annonce_id
 */ 
public function getAnnonce_id()
{
return $this->annonce_id;
}

/**
 * Set the value of annonce_id
 *
 * @return  self
 */ 
public function setAnnonce_id($annonce_id)
{
$this->annonce_id = $annonce_id;

return $this;
}


/**
 * Get the value of commentaire
 */ 
public function getCommentaire()
{
return $this->commentaire;
}

/**
 * Set the value of commentaire
 *
 * @return  self
 */ 
public function setCommentaire($commentaire)
{
$this->commentaire = $commentaire;

return $this;
}
}
<?php

require_once 'Model.class.php';

class Inscription extends Model
{
    private $nom;
    private $prenom;
    private $identifiant;
    private $mdp;
    private $erreur;

    public function __construct($nom, $prenom, $identifiant, $mdp)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->identifiant = $identifiant;
        $this->mdp = $this->hashMotDePasse($mdp);
        $this->erreur = '';
        $this->setInscription();
    }

    // HASH LE MOT DE PASSE
    private function hashMotDePasse($motDePasse){ 
        return $motDePasseHashee = hash('sha256', $motDePasse);
    } 

    private function setInscription()
    {
        if (!empty($this->nom)) {
            try {
                $requete = PARENT::getBdd()->PREPARE('INSERT INTO Users(nom, prenom, identifiant, mdp) 
                VALUES (:nom, :prenom, :identifiant, :mdp)');
                $requete->bindParam(':nom', $this->nom);
                $requete->bindParam(':prenom', $this->prenom);
                $requete->bindParam(':identifiant', $this->identifiant);
                $requete->bindParam(':mdp', $this->mdp);
                $requete->execute();
                return TRUE;
            } catch (PDOException $e) {
                $this->erreur = $e->getMessage();
            }
        }
    }


    public function verifInsertion()
    {
        if (!empty($this->erreur)) {
            return $this->erreur;
        } else {
            sleep(2); // Ajouter un délai de 3 secondes
            header('Location: ../index.php'); // Rediriger vers la page index.php
            exit(); // Terminer l'exécution du script
        }
    }
}



// MESSAGE ERREUR NE SAFFICHE PAS
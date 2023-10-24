<?php 


require_once 'Model.class.php';

class Authentification extends Model{

    private $code; 


    public function recupCode($code){$this->code = $code;}
    public function getcode(){return $this->code;}


    // Verifie si un IDENTIFIANT existe dans la bdd
    public function verifIdentifiant($email){
        
        $requete = PARENT::getBdd()->PREPARE('SELECT count(*) AS count FROM Users WHERE identifiant = :identifiant');
        $requete->bindParam(':identifiant', $email);
        $requete->execute();

        foreach($requete->fetchAll(PDO::FETCH_ASSOC) as $resultat){
            if($resultat['count'] == 1){
                return true;
            }else{
                return false;
            }
        }   
    }

    

}

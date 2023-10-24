<?php

include_once 'Model.class.php';

class Connexion extends Model
{

    private $identifiant;
    private $motDePasse;

    public function __construct($identifiant, $MotDePasse)
    {
        $this->identifiant = $this->controleCaractereSpeciaux($identifiant);
        $this->motDePasse = $this->hashMotDePasse($this->controleCaractereSpeciaux($MotDePasse));
    }

    // HASH LE MOT DE PASSE
    private function hashMotDePasse($motDePasse){
return $motDePasseHashee = hash('sha256', $motDePasse);
    }

    //CONTROLE CARACTERES SPECIAUX
    private function controleCaractereSpeciaux($chaine)
    {
        return $laChaine = htmlspecialchars($chaine);
    }

    public function getMdp()
    {
        return $this->motDePasse;
    }

    //CONTROLE QUE LES DEUX CHAMPS ONT ÉTÉ SAISIES
    public function controleSaisie()
    {
        if (!empty($_POST['identifiant'] and  $_POST['motDePasse'])) {
            $tentativeConnexion = new Connexion($_POST['identifiant'], $_POST['motDePasse']);
        } else {
            echo "Veuillez saisir toutes les cases";
        }
    }


    //Verifie IDENTIFIANT/MDP dans la bdd ET retourne 1 si trouvé 
    public function verifieIdentifiantMdp()
    { 
        $requete = PARENT::getBdd()->PREPARE('SELECT count(*) AS Valide FROM Users WHERE identifiant = :identifiant 
        AND mdp = :motDePasse');
        $requete->bindParam(':identifiant', $this->identifiant);
        $requete->bindParam(':motDePasse', $this->motDePasse);
        $requete->execute();

        $resultatRequete = $requete->fetchALL(PDO::FETCH_ASSOC);

        foreach ($resultatRequete as $identifiantMdp) {
            if ($identifiantMdp['Valide'] == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
}

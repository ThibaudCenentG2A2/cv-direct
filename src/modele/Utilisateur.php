<?php
/**
 * Gestion de l'inscription d'un utilisateur
 * @author Thierry FERNNANDEZ
 * @author Tristan DIETZ
 * @version 1.1
 */
include "connexion_bd.php";

class Utilisateur
{
    private $pseudo;
    private $prenom;
    private $nom;
    private $mail;
    private $mdp;

    function __construct($pseudo, $prenom, $nom, $mail, $mdp)
    {
        $this->pseudo = $pseudo;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->mdp = $this->encryptage_mdp($mdp);

        $this->inscrire_utilisateur();

    }

    /**
     * Fonction d'encryptage du mot de passe d'un utilisateur
     * @param $mdp Mot de passe à encrypter
     * @return string Le mot de passe encrypté
     */
    function encryptage_mdp($mdp)
    {
        return md5("on y met notre grain de sel" . $mdp);
    }

    function inscrire_utilisateur()
    {
        //TODO : à refaire avec le code d'ajout directement dans cette méthode
        require_once('../modele/UtilisateurDAO.php');

        insertion_utilisateur($this->pseudo, $this->prenom, $this->nom, $this->mail, $this->mdp);
    }

    function demarrage_session_utilisateur()
    {
        $session_name = $this->pseudo;
        $httponly = true;

        if (ini_set('session.use_only_cookies', 1) === FALSE) {
            header("Location: erreur chargement cookie"); //TODO mais WTF ?????? Tu fais quoi là ?????
            exit();
        }

        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($cookieParams["lifetime"],
            $cookieParams["path"],
            $cookieParams["domain"],
            $httponly);

        session_name($session_name);
        session_start();
        session_regenerate_id();
    }

    function connexion_utilisateur()
    {
        require_once('../modele/UtilisateurDAO.php');

        connexion_utilisateur_verif($this->mail, $this->mdp);

        $this->demarrage_session_utilisateur();
    }
}
?>

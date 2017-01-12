<?php
/**
 * Gestion de l'inscription d'un utilisateur
 * @author Thierry FERNNANDEZ
 * @author Tristan DIETZ
 * @version 1.1
 */
require_once ("connexion_bd.php");

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

    /**
     * Cette fonction va permettre de vérifier que l'adresse mail entré par
     * l'utilisateur est présente dans la base de données.
     *
     * @param String $mail Email a vérifier
     *
     * @return bool Renvoi true si présente et false sinon.
     */
    static function est_presente($mail)
    {
        $requete = $GLOBALS['pdo']->prepare('SELECT COUNT(*) FROM UTILISATEUR WHERE MAIL = :mail');
        $requete->execute(array('mail' => $mail));

        return $requete->fetch() > 0;
    }

    function verification_pseudo($pseudo)
    {
        $bdd = $GLOBALS['pdo'];
        $req = $bdd->query
        ('INSERT INTO SELECT(pseudo)FROM UTILISATEUR WHERE pseudo=:pseudo');// a modifier selon la bd hein :)
        $req->execute
        (array(":pseudo" => $pseudo));
        $data = $req->fetch();
        if (empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    function verification_email()
    {
        $bdd = $GLOBALS['pdo'];
        $req = $bdd->query
        ('INSERT INTO SELECT(email)FROM UTILISATEUR WHERE email=:email');// a modifier selon la bd hein :)
        $req->execute
        (array(":email" => $this->mail));
        $data = $req->fetch();
        if (empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    function insertion_utilisateur()
    {
        $bdd = $GLOBALS['pdo'];
        $req = $bdd->query
        ('INSERT INTO UTILISATEUR(pseudo, prenom, nom, mail,mdp) VALUES (:pseudo, :prenom, :nom, :mail, :mdp)');// a modifier selon la bd hein :)

        $req->execute
        (array(":pseudo" => $this->pseudo, ":prenom" => $this->prenom, ":nom" => $this->nom, ":mail" => $this->mail, ':mdp' => $this->mdp));
        $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
    }

    function connexion_utilisateur()
    {


        connexion_utilisateur_verif($this->mail, $this->mdp);
        demarrage_session_utilisateur($this->pseudo);
    }

    /**
     * @return bool
     */
    function connexion_utilisateur_verif()
    {
        $bdd = $GLOBALS['pdo'];
        $req = $bdd->query
        ('SELECT membre_mdp, membre_id, membre_rang, membre_pseudo
        FROM UTILISATEUR WHERE email = :mail AND mdp =:mdp'); // a modifier selon la bd hein :)

        $req->execute
        (array(":mail" => $this->mail, ':mdp' => $this->mdp));
        $data = $req->fetch();

        if ($data['mdp'] == $this->mdp) // l'acces a la bd est ok
        {   $this->demarrage_session_utilisateur();
            require_once('../controleur/Utilisateur.php');
            demarrage_session_utilisateur();
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['mail'] = $data['mail'];
            return true;

        } else // Acces pas OK !
        {
            echo 'echec de l\'acces a la bd';
            return false;
        }


    }
}
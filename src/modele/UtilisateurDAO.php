<?php
/**
 * Gestion de l'inscription d'un utilisateur sur le modèle
 * @author thierry Fernandez
 * @version 1.0
 */
class Utilisateur
{
    private $pseudo;
    private $prenom;
    private $nom;
    private $mail;
    private $mdp;

    function __construct()
    {
        session_start();
        $this->pseudo = $_POST['pseudo'];
        $this->nom = $_POST['nom'];
        $this->prenom = $_POST['prenom'];
        $this->mail = $_POST['email'];
        $this->mdp = $this->encryptage_mdp($_POST['mdp']);
        $this->inscrire_utilisateur($this->pseudo,$this->nom,$this->prenom,$this->mail,$this->mdp);


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
        require_once('../controleur/Utilisateur.php');
        connexion_utilisateur_verif($this->mail, $this->mdp);
        demarrage_session_utilisateur($this->pseudo);
    }

/**
     * @param $mail
     * @param $mdp
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
        {
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
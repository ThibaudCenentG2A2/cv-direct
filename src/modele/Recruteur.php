<?php

/**
 * Classe d'utilisateurs et fonctions relatives à ces derniers.
 *
 * @author Tristan DIETZ
 *
 * @version 1.0
 */

require_once ('BD.php');

class Recruteur
{
    private $pseudo;
    private $prenom;
    private $nom;
    private $mail;
    private $valid;
    private $admin;



    public function __construct($pseudo_or_mail, $mdp)
    {
        //TODO vérifier que le mdp correspond au pseudo ou à l'adresse mail (une requête est suffisance avec WHERE ... OR ...). Si oui, initialiser les données-membres. Sinon, tout vaut null.

        $req = BD::getInstance()->prepare("SELECT PSEUDONYME, PASSWORD, NOM, PRENOM, VALID, ADMIN
                                          FROM UTILISATEUR 
                                          WHERE UTILISATEUR.EMAIL = :mail
                                            OR UTILISATEUR.PSEUDONYME = :pseudo
                                          AND UTILISATEUR.PASSWORD = :mdp");
        $req->execute(array( ':mail' => $pseudo_or_mail, ':pseudo' =>$pseudo_or_mail,':mdp' =>$mdp ));

        $data = $req->fetch();
        if($data['PASSWORD']==$mdp)
        {
            $this->nom = $data['NOM'];
            $this->prenom = $data['PRENOM'];
            $this->pseudo = $data['PSEUDONYME'];
            $this->mail = $data['EMAIL'];
            $this->valid = $data['VALID'];
            $this->admin = $data['ADMIN'];
        }

    }


    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return ($this->getPseudo() && $this->getPrenom() && $this->getNom() && $this->getMail());
    }



    /**
     * Fonction d'encryptage du mot de passe d'un utilisateur
     * @param string $mdp Mot de passe à encrypter
     * @return string Le mot de passe encrypté
     */
    public static function encryptage_mdp($mdp)
    {
        return md5("on y met notre grain de sel" . $mdp);
    }


    /**
     * //TODO PHPDoc
     */
    public static function inscrire_utilisateur($pseudo, $nom, $prenom, $mail, $mdp) //TODO remplir tous les paramètres du formulaire demandé lors de l'inscription (voir énoncé & BD)
    {
        //TODO tests d'unicité dans la BD (mail, pseudo...) car utilisé uniquement ici (donc fonction non nécessaire)
        //TODO requête d'insertion dans la BD
        $req = BD::getInstance()->prepare('SELECT EMAIL FROM UTILISATEUR WHERE UTILISATEUR.EMAIL =:mail');// a modifier selon la bd hein :)
        $req->execute(array( ':mail' => $mail));
        $data=$req->fetch();
        if($data['EMAIL']== '' && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\\.[a-z]{2,4}$#", $mail) && !empty($mail)&& !empty($nom)&& !empty($prenom) && !empty($pseudo))
            {
            $req = BD::getInstance()->prepare('INSERT INTO UTILISATEUR(PSEUDONYME, PRENOM, NOM, EMAIL, PASSWORD, VALID) VALUES (:pseudo, :prenom, :nom, :mail, :mdp, 0)');// a modifier selon la bd hein :)
            $req->execute(array(':pseudo' => $pseudo, ':prenom' => $prenom, ':nom' => $nom, ':mail' => $mail, ':mdp' => $mdp));
            }
        else
            {   header ("Location: $_SERVER[HTTP_REFERER]" );
                echo 'Erreur EMAIL deja existant';
            }
    }



    /**
     * Cette fonction va permettre de vérifier que l'adresse mail entré par
     * l'utilisateur est présente dans la base de données.
     *
     * @param String $mail Email a vérifier
     *
     * @return bool Renvoie true si présente et false sinon.
     */
    static function est_presente($mail)
    {
        $req = BD::getInstance()->prepare('SELECT COUNT(*) FROM UTILISATEUR WHERE EMAIL = :mail');
        $req->execute(array("mail" => $mail));

        return $req->fetch() > 0;
    }


    /**
     * Cette fonction va servir à mettre à jour le mot de passe de l'utilisatur
     * ayant le mail associé.
     *
     * @param String $mail Mail du compte associé a la demande de modication de mot de passe
     * @param String $nouveau_mdp Nouveau mot de passe
     */
    static function modifier_mot_de_passe($mail, $nouveau_mdp)
    {
        $mdp = self::encryptage_mdp(htmlentities($nouveau_mdp));

        $req = BD::getInstance()->prepare('UPDATE UTILISATEUR SET PASSWORD = :nouveau_mdp WHERE EMAIL = :mail');
        $req->execute(array('nouveau_mdp' => $mdp, 'mail' => $mail));
    }


    static function recuperation_nouveaux_inscrits()
    {
        $req = BD::getInstance()->prepare('SELECT EMAIL FROM UTILISATEUR WHERE VALID = 1 ');
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    static function valider_nouvel_inscrit($mail)
    {
        $req = BD::getInstance()->prepare('UPDATE UTILISATEUR SET VALID = 1 WHERE EMAIL = '.$mail);
        $req->execute();

    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * @return mixed
     */
    public function getValid()
    {
        return $this->valid;
    }
    /**
 * @return mixed
 */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function setValidTrue()
    {
        $req = BD::getInstance()->prepare("UPDATE UTILISATEUR
                                          SET VALID = 0
                                          WHERE U.EMAIL = `$this->mail`
                                          AND U.PSEUDONYME = `$this->pseudo`
                                          ");
        $req->execute();
        
    }

}

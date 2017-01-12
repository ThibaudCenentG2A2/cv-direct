<?php

/**
 * Classe d'utilisateurs et fonctions relatives à ces derniers.
 *
 * @author Tristan DIETZ
 *
 * @version 1.0
 */
class Recruteur
{
    private $pseudo;
    private $prenom;
    private $nom;
    private $mail;



    function __construct($pseudo, $mdp)
    {
        BD::getInstance()->query('SELECT ');
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


}

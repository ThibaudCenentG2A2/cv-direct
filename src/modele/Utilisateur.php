<?php
/**
 * Gestion de l'inscription d'un utilisateur
 * @author Thierry FERNNANDEZ
 * @author Tristan DIETZ
 * @version 1.1
 */



    /**
     * Fonction d'encryptage du mot de passe d'un utilisateur
     * @param $mdp Mot de passe à encrypter
     * @return string Le mot de passe encrypté
     */
    function encryptage_mdp($mdp)
    {
        return md5("on y met notre grain de sel" . $mdp);
    }



    /**
     * Cette fonction va permettre de vérifier que l'adresse mail entré par
     * l'utilisateur est présente dans la base de données.
     *
     * @param String $mail Email a vérifier
     *
     * @return bool Renvoi true si présente et false sinon.
     */
    function est_presente($mail)
    {
        $requete = BD::getInstance()->prepare('SELECT COUNT(*) FROM UTILISATEUR WHERE MAIL = :mail');
        $requete->execute(array('mail' => $mail));

        return $requete->fetch() > 0;
    }





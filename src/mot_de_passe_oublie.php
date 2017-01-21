<?php


if (isset($_POST['mail']))
{
    $mail = htmlentities($_POST['mail']);

    require_once 'modele/Recruteur.php';
    if (Recruteur::est_presente($mail))
    {
        require_once 'modele/PieceJointe.php';
        $token = PieceJointe::generer_token_aleatoire();

        if (filter_var($mail, FILTER_VALIDATE_EMAIL) && PieceJointe::initialiser_token_mot_de_passe_oublie($token, $mail))
        {
            require_once 'modele/Courriel.php';
            Courriel::envoyer_courriel_mot_de_passe_oublie($mail, $token);

            $alerte = 1;
            require_once 'vue/mot_de_passe_oublie.php';
        }
        else
        {
            $alerte = 2;
            require_once 'vue/mot_de_passe_oublie.php';
        }
    }
    else
    {
        $alerte = 3;
        require_once 'vue/mot_de_passe_oublie.php';
    }
}
else
    require_once 'vue/mot_de_passe_oublie.php';
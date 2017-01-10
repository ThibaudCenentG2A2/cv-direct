<?php
/**
 * Gestion de l'inscription d'un utilisateur sur le modèle
 * @author thierry Fernandez
 * @version 1.0
 */
function insertion_utilisateur ($pseudo,$prenom,$nom,$mail,$mdp)
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=jeux_video;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->query
    ('INSERT INTO UTILISATEUR(pseudo, prenom, nom, mail,mdp) VALUES (:pseudo, :prenom, :nom, :mail, :mdp)');// a modifier selon la bd hein :)

    $req->execute
    (array(":pseudo" => $pseudo,":prenom" => $prenom, ":nom" => $nom, ":mail" => $mail, ':mdp'=> $mdp));

    echo 'inscription reussie';
}

function connexion_utilisateur_verif ($mail, $mdp)
{
    try
    {
        $bdd = new PDO('mysql:host=cv-direct.alwaysdata.net;dbname=cv-direct;charset=utf8mb4', 'cv-direct', 'equipettn');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->query
    ('SELECT membre_mdp, membre_id, membre_rang, membre_pseudo
        FROM UTILISATEUR WHERE email = :mail AND mdp =:mdp'); // a modifier selon la bd hein :)

    $req->execute
    (array( ":mail" => $mail, ':mdp'=> $mdp));
    $data=$req->fetch();

    if ($data['mdp'] == $mdp) // l'acces a la bd est ok
    {
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['mail'] = $data['mail'];
        return true;

    }
    else // Acces pas OK !
    {
        echo 'echec de l\'acces a la bd';
        return false;
    }

}

?>
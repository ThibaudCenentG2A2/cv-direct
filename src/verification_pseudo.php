<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 12/01/2017
 * Time: 22:09
 */
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
?>
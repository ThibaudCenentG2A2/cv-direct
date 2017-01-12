<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 12/01/2017
 * Time: 22:11
 */

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
?>
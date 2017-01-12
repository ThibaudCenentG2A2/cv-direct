<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 12/01/2017
 * Time: 22:08
 */

function demarrage_session_utilisateur()
{
    $session_name = $this->pseudo;
    $httponly = true;

    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: erreur_cookie");
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
?>
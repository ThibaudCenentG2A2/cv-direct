<?php

function demarrage_session_utilisateur()
{
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

    session_start();

}
?>
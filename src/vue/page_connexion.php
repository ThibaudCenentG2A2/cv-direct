<?php
/**
 * Page de connexion
 * User: Thierry
 * Date: 15/01/2017
 * Time: 17:11
 */
require_once ('../demarrage_session_recruteur.php');
demarrage_session_utilisateur();
require_once ('header.php');

?>

<form action="../connexion_recruteur.php" method="post">
    Pseudo: <input type="text" name="pseudo" value="" />

    Mot de passe: <input type="password" name="mdp" value="" />

    <input type="submit" name="connexion" value="Connexion" />
</form>

<?php
require_once ('footer.php');
?>
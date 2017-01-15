<?php
    include 'header.php';
    if(isset($_GET['reponse']))
    {
        require '../gestion_action_utilisateur.php';
        echo '<br/><br/>';
        afficher_type_changement($_GET['reponse']);
    }
?>

<?php
    require '../gestion_affichage_tous_les_cv.php';
?>
<?php
    include 'footer.php';
?>

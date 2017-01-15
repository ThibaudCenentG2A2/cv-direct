<?php
    include 'header.php';
    if(isset($_GET['reponse']))
    {
        require '../gestion_action_utilisateur.php';
        echo '<br/><br/>';
        afficher_type_changement($_GET['reponse']);
    }
?>
    <form action="../valider_maj_cv.php?numero=<?php echo $_GET['numero'];?>" method="post" style="margin-left: 20px; color: black">
        <label> Nom : </label>
            <input name="nom" type="text" /> <br/> <br/>
        <label> Prenom : </label>
            <input name="prenom" type="text" /> <br/> <br/>
        <label> Adresse : </label>
            <input name="adresse" type="text" /> <br/> <br/>
        <label> Code Postal : </label>
            <input name="code_postal" type="text" /> <br/> <br/>
        <label> Ville : </label>
            <input name="ville" type="text" /> <br/> <br/>
        <label> Téléphone Portable : </label>
            <input name="num_portable" type="text" /> <br/> <br/>
        <label> Téléphone Fixe : </label>
            <input name="num_fixe" type="text" /> <br/> <br/>
        <input type="submit" name = "majcv" value="Enregistrer Modifications"/>
        <input type="submit" name="majcv" value="Annuler"/>
    </form>

<?php include 'footer.php';?>
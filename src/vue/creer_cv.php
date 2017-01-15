<?php
    include 'header.php';
    if(isset($_GET['reponse']))
    {
        require '../gestion_action_utilisateur.php';
        echo '<br/><br/>';
        afficher_type_changement($_GET['reponse']);
    }
?>
    <form action="../valider_creation_cv.php" method="post" enctype="multipart/form-data" style="margin-left: 20px; color: black">
        <label > Création CV </label> <br/> <br/>
        <label > Nom : </label>
            <input name="nom" type="text" required/> <br/> <br/>
        <label> Prenom : </label>
            <input name="prenom" type="text" required/> <br/> <br/>
        <label> Adresse : </label>
            <input name="adresse" type="text" required /> <br/> <br/>
        <label> Code Postal : </label>
            <input name="code_postal" type="text" required/> <br/> <br/>
        <label> Ville : </label>
            <input name="ville" type="text" required/> <br/> <br/>
        <label> Numéro Securité Sociale : </label>
            <input name="num_secu_sociale" type="number" size="15" required/> <br/> <br/>
        <label> Téléphone Portable : </label>
            <input name="num_portable" type="text" required/> <br/> <br/>
        <label> Téléphone Fixe : </label>
            <input name="num_fixe" type="text" /> <br/> <br/>
        <label> Photographie </label>
            <input name="photo" type="file" required"/> <br/> <br/>
            <input type="hidden" name="max_size_photo" value="307200">
        <label> Contrat Assurance Professionnel </label>
            <input name="assurance" type="file"/> <br/> <br/>
            <input type="hidden" name="max_size_assurance" value="819200"/>
        <label> CV PDF </label>
            <input name="cvpdf" type="file"/> <br/> <br/>
            <input type="hidden" name="max_size_cv_pdf" value="409600"/>
        <input type="submit" name = "creer" value="Creer CV"/>
        <input type="submit" name="creer" value="Annuler"/>
    </form>

<?php include 'footer.php';?>
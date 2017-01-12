
    <form action="../valider_maj_cv.php?numero=<?php$_GET['numero']?>"method="post">
        <label> Téléphone Portable : </label>
            <input name="num_portable" type="text" /> <br/> <br/>
        <label> Téléphone Fixe : </label>
            <input name="num_fixe" type="text" /> <br/> <br/>
        <label> Adresse : </label>
            <input name="adresse" type="text" /> <br/> <br/>
        <label> Code Postal : </label>
            <input name="code_postal" type="text" /> <br/> <br/>
        <label> Ville : </label>
            <input name="ville" type="text" /> <br/> <br/>
        <label> Nom : </label>
            <input name="nom" type="text" /> <br/> <br/>
        <label> Prenom : </label>
            <input name="prenom" type="text" /> <br/> <br/>
        <input type="submit" name = "Maj_CV" value="Enregistrer Modifications" style="margin-left: 20px;"/>
        <input type="submit" name="Maj_CV" value="Annuler"/>
    </form>
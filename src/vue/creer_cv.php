
    <form action="../valider_creation_cv.php" method="post" enctype="multipart/form-data">
        <label> Création CV </label> <br/> <br/>
        <label> Numéro Securité Sociale : </label>
            <input name="num_secu_sociale" type="number" required/> <br/> <br/>
        <label> Téléphone Portable : </label>
            <input name="num_portable" type="text" required/> <br/> <br/>
        <label> Contrat Assurance Professionnel : </label>
            <input name="assurance" type="file"/> <br/> <br/>
            <input type="hidden" name="max_size_assurance" value="819200"/>
        <label> CV PDF : </label>
            <input name="cv_pdf" type="file"/> <br/> <br/>
            <input type="hidden" name="max_size_cv_pdf" value="409600"/>
        <label> Téléphone Fixe : </label>
            <input name="num_fixe" type="text" /> <br/> <br/>
        <label> Adresse : </label>
            <input name="adresse" type="text" required /> <br/> <br/>
        <label> Code Postal : </label>
            <input name="code_postal" type="text" required/> <br/> <br/>
        <label> Ville : </label>
            <input name="ville" type="text" required/> <br/> <br/>
        <label> Nom : </label>
            <input name="nom" type="text" required/> <br/> <br/>
        <label> Prenom : </label>
            <input name="prenom" type="text" required/> <br/> <br/>
        <label> Photographie : </label>
            <input name="photo" type="file" required"/> <br/> <br/>
            <input type="hidden" name="max_size_photo" value="307200">
        <label> Expérience Professionnelle </label> <br/> <br/>
        <label> Compétences </label> <br/>
            <input type="checkbox" name="choix_competence" value="C++"/> C++ <br/>
            <input type="checkbox" name="choix_competence" value="JAVA"/> JAVA <br/>
            <input type="checkbox" name="choix_competence" value="PHP"/> PHP <br/>
            <input type="checkbox" name="choix_competence" value="HTML5"/> HTML5 <br/>
            <input type="checkbox" name="choix_competence" value="CSS"/> CSS <br/> <br/>
        <input type="submit" name = "creer" value="Creer CV" style="margin-left: 20px;"/>
        <input type="submit" name="creer" value="Annuler"/>
    </form>
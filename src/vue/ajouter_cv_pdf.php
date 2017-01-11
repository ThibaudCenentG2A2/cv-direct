
    <form action="../controleur/valider_ajout_cv_pdf.php" method="post" enctype="multipart/form-data">
        <label> CV PDF à ajouter : </label>
            <input name="cv_pdf" type="file"/> <br/> <br/>
            <input type="hidden" name="max_size_cv_pdf" value="409600"/>
        <input type="submit" name = "ajout_cv-pdf" value="Ajouter CV PDF"/>
    </form>
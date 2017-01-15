<?php include 'header.php';?>

    <form action="../valider_ajout_cv_pdf.php?numero=<?php echo $_GET['numero'];?>" method="post" style="margin-left: 20px; color: black"
          enctype="multipart/form-data">
        <label> CV PDF à ajouter : </label>
            <input name="cvpdf" type="file"/> <br/> <br/>
            <input type="hidden" name="max_size_cv_pdf" value="409600"/>
        <input type="submit" name = "ajoutcvpdf" value="Ajouter CV PDF" style="margin-left: 20px;"/>
        <input type="submit" name = "ajoutcvpdf" value="Annuler" />
    </form>

<?php include 'footer.php';?>
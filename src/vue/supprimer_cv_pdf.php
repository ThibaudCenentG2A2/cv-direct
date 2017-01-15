<?php include 'header.php';?>
    <form action="../valider_suppression_cv_pdf.php?numero=<?php echo $_GET['numero'];?>&amp;id=<?php echo $_GET['id'];?>
    &amp;idpj=<?php echo $_GET['idpj'];?>" method="post" style="margin-left: 20px; color: black">
        <label> Voulez-vous vraiment supprimer ce CV au format PDF ? </label> <br/> <br/>
        <input type="submit" name= "action" value="Supprimer" style="margin-left: 20px;"/>
        <input type="submit" name="action" value="Annuler"/>
    </form>

<?php include 'footer.php';?>
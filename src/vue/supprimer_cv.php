<?php include 'header.php';?>
    <form action="../valider_suppression_cv.php?numero=<?php echo $_GET['numero'];?>" method="post" style="margin-left: 20px; color: black">
        <label> Voulez-vous vraiment supprimer ce CV ? </label> <br/> <br/>
            <input type="submit" name= "action" value="Supprimer" style="margin-left: 20px;"/>
            <input type="submit" name="action" value="Annuler"/>
    </form>

<?php include 'footer.php';?>
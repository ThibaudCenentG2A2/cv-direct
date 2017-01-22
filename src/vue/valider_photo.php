<?php
    require_once 'vue/header.php';
    echo $reponse;
?>
    <section class="main-container" style="text-align: center">
        <div class="container">
            <div class="row">
                <br/>
                <h1 class="page-title" >Voulez-vous vraiment définir cette photo comme photo de profil ?</h1>
                <div class="separator-2" style="left: 20%"></div>
                <?php
                if(isset($_GET['idpj']))
                {
                ?>
                    <img src="cv/pieces_jointes/<?php echo $nouvelle_photo->get_token();?>.<?php echo $nouvelle_photo->get_extension();?>" style=" position: relative; left: 35%;">
                    <form action="../valider_photo?numero=<?php echo $_GET['numero'];?>&amp;idpj=<?php echo $nouvelle_photo->get_id_piece_jointe();?>" method="post">
                <?php
                }
                else
                {
                ?>
                    <img src="cv/pieces_jointes/<?php echo $photo_provisoire->get_token();?>.<?php echo $photo_provisoire->get_extension();?>" style="position: relative; left: 35%;">
                    <form action="../valider_photo?numero=<?php echo $_GET['numero'];?>&amp;idpj=<?php echo $photo_provisoire->get_id_piece_jointe();?>" method="post">
                <?php
                }
                ?>
                        <div class="main col-md-6 col-md-offset-3 pv-40">
                            <input type="submit" name="valider" value="Oui" class="btn btn-default btn-animated btn-lg" />
                            <input type="submit" name="valider" value="Non" class="btn btn-default btn-animated btn-lg" />
                        </div>
                    </form>
                    <!-- main end -->
            </div>
        </div>
    </section>

<?php
    require_once 'vue/footer.php';
?>

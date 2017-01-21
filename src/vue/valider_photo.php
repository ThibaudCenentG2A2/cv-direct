<?php
    require_once 'vue/header.php';
    echo $reponse;
?>
    <section class="main-container jumbotron light-gray-bg text-center margin-clear">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <?php
                if(isset($_GET['idpj']))
                {
                ?>
                    <img src="cv/pieces_jointes/<?php echo $nouvelle_photo->get_token();?>.<?php echo $nouvelle_photo->get_extension();?>" style=" position: relative; left: 35%;">
                    <form action="../valider_photo?numero=<?php echo $_GET['numero'];?>&idpj=<?php echo $nouvelle_photo->get_id_piece_jointe();?>" method="post" style="margin-left: 20px; color: black">
                <?php
                }
                else
                {
                ?>
                    <img src="cv/pieces_jointes/<?php echo $photo_provisoire->get_token();?>.<?php echo $photo_provisoire->get_extension();?>" style="position: relative; left: 35%;">
                    <form action="../valider_photo?numero=<?php echo $_GET['numero'];?>.<?php echo $photo_provisoire->get_id_piece_jointe();?>" method="post" style="margin-left: 20px; color: black">
                <?php
                }
                ?>
                        <div class="main col-md-6 col-md-offset-3 pv-40">
                            <h2>Voulez-vous confirmer la photo choisi ?</h2> <br/> <br/>
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

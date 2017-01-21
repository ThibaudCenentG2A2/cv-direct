<?php
require_once 'vue/header.php';
?>
    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container jumbotron light-gray-bg text-center margin-clear">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <img src="cv/pieces_jointes/<?php echo $photo->get_token();?>.<?php echo $photo->get_extension();?>" style=" position: relative; left: 35%;">
                <form action="../supprimer_photo?numero=<?php echo $photo->get_id_cv();?>&amp;idpj=<?php echo $photo->get_id_piece_jointe();?>" method="post" style="margin-left: 20px; color: black">
                    <div class="main col-md-6 col-md-offset-3 pv-40">
                        <h2> Voulez-vous vraiment supprimer cette photo ? </h2> <br/> <br/>
                        <input type="submit" name="supprimer" value="Supprimer" class="btn btn-default btn-animated btn-lg"/>
                        <input type="submit" name="supprimer" value="Annuler" class="btn btn-default btn-animated btn-lg" />
                    </div>
                </form>
                <!-- main end -->
            </div>
        </div>
    </section>
    <!-- main-container end -->
<?php
require_once 'vue/footer.php';
?>
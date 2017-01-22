<?php
require_once 'vue/header.php';
?>
    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container" style="text-align: center">
        <div class="container">
            <div class="row">
                <br/>
                <h1 class="page-title" >Voulez-vous vraiment supprimer cette photo ? </h1>
                <div class="separator-2" style="left: 20%"></div>
                <img src="cv/pieces_jointes/<?php echo $photo->get_token();?>.<?php echo $photo->get_extension();?>" style=" position: relative; left: 35%;">
                <form action="../supprimer_photo?numero=<?php echo $photo->get_id_cv();?>&amp;idpj=<?php echo $photo->get_id_piece_jointe();?>" method="post">
                    <div class="main col-md-6 col-md-offset-3 pv-40">
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
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
                    if(isset($photo))
                    {
                    ?>
                        <img src="cv/pieces_jointes/<?php echo $photo->get_token();?>.<?php echo $photo->get_extension();?>" style=" position: relative; left: 35%;">
                        <form action="../valider_photo?numero=<?php echo $_GET['numero'];?>&idpj=<?php echo $piece_jointe;?>" method="post" style="margin-left: 20px; color: black">
                    <?php
                    }
                    else
                    {
                    ?>
                        <img src="vue/images_site/unknown.png" style="position: relative; left: 35%;">
                            <form action="../valider_photo?numero=<?php echo $_GET['numero'];?>" method="post" style="margin-left: 20px; color: black">
                    <?php
                    }
                    ?>
                            <div class="main col-md-6 col-md-offset-3 pv-40">
                                <h2> Modification Photographie</h2> <br/> <br/>
                                <div class="form-group has-feedback">
                                    <input type="file" class="form-control" name="photo"/>
                                    <input type="hidden" name="max_size_photo" value="307200">
                                </div> <br/> <br/>
                                <input type="submit" name="maj_photo" value="Choisir Photo" class="btn btn-default btn-animated btn-lg"/>
                                <input type="submit" name="maj_photo" value="Annuler" class="btn btn-default btn-animated btn-lg" />
                            </div>
                        </form>
                    <!-- main end -->
                </div>
            </div>
        </section>
<?php
    require_once 'vue/footer.php';
?>

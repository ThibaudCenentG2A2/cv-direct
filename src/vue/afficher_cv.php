<?php
    require_once 'vue/header.php';
    echo $reponse;
?>

            <div class="container" style="color: black; position: absolute; margin-left: 5px; top:23%;">
                <div class="row">
                    <form method="post" action="../ajouter_cv_pdf?numero=<?php echo $_GET['numero'];?>">
                        <input type="submit" name="ajoutpdf" value="Ajouter un CV PDF" class="submit-button btn btn-default" style="display: inline;"/>
                    </form>
                </div>
            </div>
            <div class="image-box team-member style-2 shadow bordered light-gray-bg text-center" style="position: absolute; width: 10%; height: 10%; left: 70%; top : 25%;">
                <?php
                if(!empty($photo))
                {
                ?>
                    <a href="cv/pieces_jointes/<?php echo $photo->get_token();?>.<?php echo $photo->get_extension();?>"> <img src="cv/pieces_jointes/<?php echo $photo->get_token();?>.<?php echo $photo->get_extension();?>"> </a>
                <?php
                }
                else
                {
                ?>
                    <a href="vue/images_site/unknown.png"> <img src="vue/images_site/unknown.png"> </a>
                <?php
                }
                ?>
            </div>
            <br/>
			<section class="main-container" >
				<div class="container">
					<div class="row" style="text-align: center; color: black">
                        <h1 class="page-title" > CV N° <?php echo $_GET['numero'];?> </h1> <br/>
                        <div class="page-title" >
                            <p> Nom : <?php echo $cv_a_afficher->get_nom();?> </p> <br/>
                            <p> Prenom : <?php echo $cv_a_afficher->get_prenom(); ?> </p> <br/>
                            <p> Pseudonyme : <?php echo $cv_a_afficher->get_pseudo();?> </p> <br/>
                            <p> Adresse : <?php echo $cv_a_afficher->get_adresse(); ?> </p> <br/>
                            <p> Code Postal : <?php echo $cv_a_afficher->get_code_postal(); ?> </p> <br/>
                            <p> Ville : <?php echo $cv_a_afficher->get_ville(); ?> </p> <br/>
                            <p> Numéro Portable : <?php echo $cv_a_afficher->get_num_tel_portable(); ?></p> <br/>
                            <?php
                                if($cv_a_afficher->get_num_tel_fixe())
                                {
                            ?>
                                    <p> Numéro Fixe : <?php echo $cv_a_afficher->get_num_tel_fixe(); ?></p> <br/>
                            <?php
                                }
                            ?>
                            <p> Numéro de Sécurité Sociale : <?php echo $cv_a_afficher->get_numero_secu_sociale() ?> </p> <br/>
                        </div>
					</div>
				</div>
                <div class="col-sm" style="display: inline-block; position: relative; left: 55%;">
                    <a href="../maj_cv?numero=<?php echo $cv_a_afficher->get_id_cv();?>"> <img src="vue/images_site/update.png" width=35 height=35> </a>
                </div>
                <div class="col-sm" style="display: inline-block; position: relative; left: 40%;">
                    <a href="../supprimer_cv?numero=<?php echo $cv_a_afficher->get_id_cv();?>"><img src="vue/images_site/supprimer.png" width=27 height=27> </a>
                </div>
            </section>
            <br/> <br/> <br/> <br/>
            <h1 class="page-title" style="text-align: center;"> CV PDF </h1> <br/> <br/> <br/>
            <?php
                foreach ($cv_a_afficher->get_liste_cv_pdf() as $cv_pdf)
                {
            ?>
                    <div class="image-box team-member style-2 shadow bordered light-gray-bg text-center" style="display: inline-block; width: 8%; margin-left: 20px;">
                        <a href="../cv/pieces_jointes/<?php echo $cv_pdf->get_token(); ?>.<?php echo $cv_pdf->get_extension();?>"><img src="vue/images_site/cvpdf.png"> </a>
                        <div class="body">
                            <h3 class="margin-clear" style="text-align: center">N° <?php echo $cv_pdf->get_id_piece_jointe();?> </h3>
                        </div>
                        <div class="col-sm">
                            <a href="../supprimer_cv_pdf?numero=<?php echo $cv_pdf->get_id_cv();?>&idpdf=<?php echo $cv_pdf->get_id_piece_jointe()?>"><img src="vue/images_site/supprimer.png" width=15 height=15 style="display: inline"> </a>
                        </div>
                    </div>
            <?php
                }
            ?>
 <?php
    require_once 'vue/footer.php';
?>
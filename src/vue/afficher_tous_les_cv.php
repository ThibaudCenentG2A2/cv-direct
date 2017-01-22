<?php
    require_once 'vue/header.php';
    echo $reponse;
?>
	<section class="main-container">
		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content clear-style">
                        <div class="tab-pane active" id="pill-2">
                            <div class="row masonry-grid-fitrows grid-space-10">
                                <?php
                                foreach ($liste_cv_bd as $cv_a_afficher) // Parcourt de chaque CV présent dans la BD avec l'affichage imposé soit la photo + l'identifiant du CV
                                {
                                ?>
                                    <div class="col-md-3 col-sm-6 masonry-grid-item">
                                        <div class="listing-item white-bg bordered mb-20">
                                            <div class="overlay-container">
                                                <a href="../afficher_cv?numero=<?php echo $cv_a_afficher->get_id_cv(); ?>"> <img src="vue/images_site/cv.png"> </a>
                                            </div>
                                            <div class="body" style="margin-left: 38px;">
                                                <h3><a href="../afficher_cv?numero=<?php echo $cv_a_afficher->get_id_cv(); ?>"> <?php echo $cv_a_afficher->__toString();?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
					<!-- pills end -->
					<!-- pagination start -->
					<nav class="text-center">
						<ul class="pagination">
                            <?php // Condition de gestion de la pagination automatique
                            echo '<br/> <br/>';
                            if($nbre_pages > 0) //
                            {
                                if($nbre_pages == 1) // Si notre BD ne contient que 8 CV
                                    echo '<li class="active"><a href="../afficher_tous_les_cv?page='. $nbre_pages . '">' . $nbre_pages . '</a> </li>';
                                else if($i == 1 && $nbre_pages > 1)
                                {
                                    echo '<li class="active"><a href="../afficher_tous_les_cv?page='. $i . '">' . $i . '</a> </li>';
                                    echo '<li><a href="../afficher_tous_les_cv?page=' . $suivant . '" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>';
                                }
                                else if ($i != $nbre_pages && $i > 1) // Si on a plus de 8 CV et qu'on ne se trouve pas sur la dernière page disponible
                                {
                                    echo '<li><a href="../afficher_tous_les_cv?page=' . --$i . '" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li> ';
                                    echo '<li class="active"><a href="../afficher_tous_les_cv?page='. $i . '">' . $i . '</a> </li>';
                                    echo '<li><a href="../afficher_tous_les_cv?page=' . $suivant . '" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>';
                                }
                                else
                                {
                                        echo '<li><a href="../afficher_tous_les_cv?page=' . --$i . '" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li> ';
                                        echo '<li class="active"><a href="../afficher_tous_les_cv?page=' . $nbre_pages . '"> ' . $nbre_pages . '</a></li> ';
                                }
                            }
                            ?>
						</ul>
					</nav>
					<!-- pagination end -->
				</div>
				<!-- main end -->
			</div>
		</div>
	</section>
<?php
    require_once 'vue/footer.php';
?>
<?php
    require_once 'vue/header.php';
    echo $reponse;
?>
            <!-- main-container start -->
			<!-- ================ -->
            <br/> <br/>
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">
							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">CV N° <?php echo $cv_a_afficher->get_id_cv();?></h1>
							<div class="separator-2"></div>
							<!-- page-title end -->
							<div class="row">
								<div class="col-md-4">
                                    <div class="tab-pane active" id="pill-1">
                                        <div class="owl-carousel content-slider-with-large-controls">
                                            <div class="overlay-container overlay-visible">
                                                <?php
                                                if(!empty($photo))
                                                {
                                                ?>
                                                    <img src="cv/pieces_jointes/<?php echo $photo->get_token();?>.<?php echo $photo->get_extension();?>" alt="">
                                                    <a href="cv/pieces_jointes/<?php echo $photo->get_token();?>.<?php echo $photo->get_extension();?>" class="popup-img overlay-link"><i class="icon-plus-1"></i></a>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <img src="vue/images_site/unknown.png" alt="">
                                                    <a href="vue/images_site/unknown.png" class="popup-img overlay-link"><i class="icon-plus-1"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <ul class="nav nav-pills">
                                            <li><a href="../maj_photo?numero=<?php echo $photo->get_id_cv();?>&idpj=<?php echo $photo->get_id_piece_jointe();?>"><i class="fa fa-camera pr-5"></i> Modifier Photo </a></li>
                                            <li><a href="../supprimer_photo?idpj=<?php echo $photo->get_id_piece_jointe();?>"><i class="fa fa-times md"></i> Supprimer Photo </a></li>
                                        </ul>
                                    </div>
									<!-- pills end -->
								</div>
							</div>
						</div>
						<!-- main end -->
					</div>
				</div>
			</section>
			<!-- main-container end -->
			<!-- section start -->
			<!-- ================ -->
			<section class="pv-30 light-gray-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li><a href="../maj_cv?numero=<?php echo $cv_a_afficher->get_id_cv();?>"><i class="fa fa-gears"></i> Modifier CV </a></li>
                                <li><a href="../supprimer_cv?numero=<?php echo $cv_a_afficher->get_id_cv();?>" title="video"><i class="fa fa-times md"></i> Supprimer CV</a></li>
                            </ul>
							<ul class="nav nav-tabs style-4" role="tablist">
								<li class="active"><a href="#h2tab2" role="tab" data-toggle="tab"><i class="fa fa-files-o pr-5"></i>Profil</a></li>
                                <li><a href="#h2tab3" role="tab" data-toggle="tab"><i class="fa fa-star pr-5"></i> Contrat d'Assurance Pro</a> </li>
								<li><a href="#h2tab4" role="tab" data-toggle="tab"><i class="fa fa-star pr-5"></i>CV PDF</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content padding-top-clear padding-bottom-clear">
								<div class="tab-pane fade in active" id="h2tab2">
									<h4 class="space-top">Identité</h4>
									<hr>
									<dl class="dl-horizontal">
										<dt>Nom</dt>
										<dd> <?php echo $cv_a_afficher->get_nom();?> </dd> <br/>
										<dt>Prenom</dt>
										<dd><?php echo $cv_a_afficher->get_prenom(); ?></dd> <br/>
										<dt>Pseudonyme</dt>
										<dd><?php echo $cv_a_afficher->get_pseudo();?></dd> <br/>
										<dt>Adresse </dt>
										<dd><?php echo $cv_a_afficher->get_adresse();?></dd> <br/>
										<dt>Code Postal</dt>
										<dd><?php echo $cv_a_afficher->get_code_postal();?></dd> <br/>
										<dt>Ville </dt>
										<dd><?php echo $cv_a_afficher->get_ville();?></dd> <br/>
										<dt>Numéro de Sécu</dt>
										<dd><?php echo $cv_a_afficher->get_numero_secu_sociale();?></dd> <br/>
                                        <dt>Numéro Portable</dt>
                                        <dd><?php echo $cv_a_afficher->get_num_tel_portable();?></dd> <br/>
                                        <?php
                                        if($cv_a_afficher->get_num_tel_fixe())
                                        {
                                        ?>
                                            <dt>Numéro Fixe</dt>
                                            <dd><?php echo $cv_a_afficher->get_num_tel_fixe();?></dd> <br/>
                                        <?php
                                        }
                                        ?>
									</dl>
									<hr>
								</div>
                                <div class="tab-pane active" id="h2tab3">
                                    <div class="main col-md-12">
                                        <!-- Tab panes -->
                                        <div class="tab-content clear-style">
                                            <div class="tab-pane active" id="pill-2">
                                                <img src="cv/pieces_jointes/<?php echo $contrat_assurance->get_token(); ?>.<?php echo $contrat_assurance->get_extension(); ?>"
                                                     width="85%">
                                                <a href="cv/pieces_jointes/<?php echo $contrat_assurance->get_token(); ?>.<?php echo $contrat_assurance->get_extension(); ?>"
                                                   class="popup-img overlay-link"><i class="icon-plus-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="tab-pane fade" id="h2tab4">
                                    <div class="main col-md-12">
                                        <!-- Tab panes -->
                                        <div class="tab-content clear-style">
                                            <div class="tab-pane active" id="pill-2">
                                                <div class="row masonry-grid-fitrows grid-space-10">
                                                    <?php
                                                    foreach ($liste_pdf as $cv_pdf)
                                                    {
                                                    ?>
                                                        <div class="col-md-3 col-sm-6 masonry-grid-item">
                                                            <div class="listing-item white-bg bordered mb-20">
                                                                <div class="overlay-container">
                                                                    <a href="../cv/pieces_jointes/<?php echo $cv_pdf->get_token(); ?>.<?php echo $cv_pdf->get_extension();?>"> <img src="vue/images_site/cvpdf.png"> </a>
                                                                </div>
                                                                <div class="body" style="margin-left: 20px;">
                                                                    <h3><a href="../cv/pieces_jointes/<?php echo $cv_pdf->get_token();?>.<?php echo $cv_pdf->get_extension();?>"> CV PDF N°<?php echo $cv_pdf->get_id_piece_jointe();?></a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- section end -->
<?php
    require_once 'vue/footer.php';
?>
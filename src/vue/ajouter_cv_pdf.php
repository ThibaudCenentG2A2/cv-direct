<?php
    require_once 'vue/header.php';
    echo $reponse;
?>
			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container" style="text-align: center;">
				<div class="container">
					<div class="row">
                        <h1 class="page-title" >Ajouter un nouveau CV PDF</h1>
                        <div class="separator-2" style="left: 20%"></div>
                        <form action="../ajouter_cv_pdf?numero=<?php echo $_GET['numero'];?>" method="post" enctype="multipart/form-data" style="margin-left: 20px; color: black">
						    <div class="main col-md-6 col-md-offset-3 pv-40">
                                <div class="form-group has-feedback">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                                    <input type="file" class="form-control" name="cvpdf"/>
                                </div> <br/> <br/>
                                <input type="submit" name="ajoutcvpdf" value="Ajouter CV PDF" class="btn btn-default btn-animated btn-lg"/>
                                <input type="submit" name="ajoutcvpdf" value="Annuler" class="btn btn-default btn-animated btn-lg" />
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

<?php
    require_once 'vue/header.php';
    echo $reponse;
?>
			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container jumbotron light-gray-bg text-center margin-clear">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
                        <form action="../ajouter_cv_pdf?numero=<?php echo $_GET['numero'];?>" method="post" style="margin-left: 20px; color: black">
						    <div class="main col-md-6 col-md-offset-3 pv-40">
							    <h2> CV PDF à ajouter </h2> <br/> <br/>
                                <div class="form-group has-feedback">
                                    <input type="file" class="form-control" name="cvpdf"/>
                                    <input type="hidden" name="max_size_photo" value="307200">
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

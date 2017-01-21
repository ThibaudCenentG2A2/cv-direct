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
                        <form action="../supprimer_cv_pdf?numero=<?php echo $_GET['numero'];?>&amp;idpdf=<?php echo $_GET['idpdf'];?>" method="post" style="margin-left: 20px; color: black">
						    <div class="main col-md-6 col-md-offset-3 pv-40">
							    <h2> Voulez-vous vraiment supprimer ce CV au format PDF ? </h2> <br/> <br/>
                                <input type="submit" name="action" value="Supprimer" class="btn btn-default btn-animated btn-lg"/>
                                <input type="submit" name="action" value="Annuler" class="btn btn-default btn-animated btn-lg" />
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

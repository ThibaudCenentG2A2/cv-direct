<?php
    require_once 'vue/header.php';
?>
			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container" style="text-align: center;">
				<div class="container">
					<div class="row">
                        <br/>
                        <h1 class="page-title" >Voulez-vous vraiment supprimer ce CV ?</h1>
                        <div class="separator-2" style="left: 20%"></div>
                        <form action="../supprimer_cv?numero=<?php echo $_GET['numero'];?>" method="post">
						    <div class="main col-md-6 col-md-offset-3 pv-40">
                                <input type="submit" name="action" value="Supprimer" class="btn btn-default btn-lg"/>
                                <input type="submit" name="action" value="Annuler" class="btn btn-default btn-lg" />
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

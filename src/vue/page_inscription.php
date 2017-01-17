<?php
/**
 * Created by PhpStorm.
 * User: Thierry
 * Date: 16/01/2017
 * Time: 21:31
 */
require_once ('header.php');
?>
<div class="main-container dark-translucent-bg" style="background-image:url('images/background-img-6.jpg');">
				<div class="container">
					<div class="row">
						<!-- main start -->
						<!-- ================ -->
						<div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
							<div class="form-block center-block p-30 light-gray-bg border-clear">
								<h2 class="title">Inscription</h2>
								<form class="form-horizontal" role="form" action="../inscription_recruteur.php" method="post">
									<div class="form-group has-feedback">
										<label for="inputName" class="col-sm-3 control-label">Nom <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="nom_inscription" placeholder="Nom" required>
											<i class="fa fa-pencil form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="inputLastName" class="col-sm-3 control-label">Prenom <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="prenom_inscription" placeholder="Prenom" required>
											<i class="fa fa-pencil form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="inputUserName" class="col-sm-3 control-label">Pseudo <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="pseudo_inscription" placeholder="pseudo" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="email" class="form-control" name="mail_inscription" placeholder="Email" required>
											<i class="fa fa-envelope form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group has-feedback">
										<label for="inputPassword" class="col-sm-3 control-label">Mot de passe <span class="text-danger small">*</span></label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="mot_de_passe" placeholder="mot de passe" required>
											<i class="fa fa-lock form-control-feedback"></i>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<div class="checkbox">
												<label>
													<input type="checkbox" required> Acceptez nos <a href="#"> conditions générales d'utilisation </a>
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-8">
											<input type="submit" class="btn btn-group btn-default btn-animated"> </input>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- main end -->
					</div>
				</div>
			</div>
<?php
require_once ('footer.php');
?>
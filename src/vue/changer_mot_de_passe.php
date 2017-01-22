<?php
require_once 'vue/header.php';

?>

    <section class="main-container">
        <div class="container">
            <div class="row">

                <!-- debut conteneur -->
                <div class="main col-md-12">
<?php
if (isset($alerte) && $alerte == 1)
    echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Les mots de passe ne sont pas identiques !</div>';
if (isset($erreur) && isset($alerte) && $alerte == 3)
{
    require_once 'modele/Recruteur.php';
    echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$erreur.'</div>';
}

?>
                    <!-- titre de la page -->
                    <h1 class="page-title">Modification du mot de passe</h1>
                    <div class="separator-2"></div>

                    <!-- descriptif de la page -->
                    <p>Merci d'entrer un nouveau mot de passe. Celui doit être fort, c'est à dire qu'il doit respecter quelques normes de sécurité. Nous vous conseillons pour cela d'utiliser des minuscules, majuscules, chiffres et caractères spéciaux mélangés afin de satisfaire à une bonne sécurité.</p>

                    <!-- formulaire -->

                    <div class="icon-contacts-form">
                        <form action="../modification_mot_de_passe?mail=<?php echo $mail; ?>" class="form-horizontal" method="post">

                            <div class="form-group has-feedback">
                                <label for="inputMdp" class="col-sm-4 control-label">Nouveau mot de passe</label>
                                <div class="col-sm-4">
                                    <input name="mdp1" type="password" class="form-control" id="inputMdp" required>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="inputMdp" class="col-sm-4 control-label">Retapez le nouveau mot de passe</label>
                                <div class="col-sm-4">
                                    <input name="mdp2" type="password" class="form-control" id="inputMdp" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-group btn-default btn-alert">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main-container end -->

<?php require_once 'vue/footer.php'; ?>
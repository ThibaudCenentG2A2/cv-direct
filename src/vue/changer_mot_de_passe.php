<?php
require_once 'vue/header.php';

if ($alerte == 1)
    echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Les mots de passe ne sont pas identiques !</div>';
?>
    <div class="p-30"> <!--light-gray-bg pour mettre le fond en gris-->
        <form action="../modification_mot_de_passe?mail=<?php echo $mail; ?>" class="form-horizontal" method="post">

            <div class="form-group has-feedback">
                <label for="inputMdp" class="col-sm-4 control-label">Nouveau mot de passe</label>
                <div class="col-sm-4">
                    <input name="mdp1" type="password" class="form-control" id="inputMdp" required>
                    <p></p>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="inputMdp" class="col-sm-4 control-label">Retapez le nouveau mot de passe</label>
                <div class="col-sm-4">
                    <input name="mdp2" type="password" class="form-control" id="inputMdp" required>
                    <p></p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-group btn-default btn-alert">Envoyer</button>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'vue/footer.php'; ?>
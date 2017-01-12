<?php require_once ('header.php'); ?>

    <div class="row">
        <div class="col-md-12">

        </div>
    </div>

    <h4 style="margin-left: 10.5%; margin-bottom: 1%;">Mot de passe oublié</h4>
    <form action="mot_de_passe_oublie.php" class="form-horizontal">
        <div class="form-group has-feedback">
            <label for="inputMail" class="col-sm-3 control-label">Saisissez votre adresse mail</label>
            <div class="col-sm-8">
                <input name="mail" type="text" class="form-control" id="inputMail" placeholder="mail@example.org" required>
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">

                <button type="submit" class="btn btn-group btn-default ">Envoyer</button>
            </div>
        </div>
    </form>

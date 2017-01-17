<?php require_once ('header.php'); ?>


<form action="../mot_de_passe_oublie.php" class="form-horizontal" method="post">

    <div class="form-group has-feedback">
        <label for="inputMail" class="col-sm-4 control-label">Saisissez votre adresse mail</label>
        <div class="col-sm-4">
            <input name="mail" type="text" class="form-control" id="inputMail" placeholder="mail@example.org">
            <i class="fa fa-envelope form-control-feedback"></i>
            <p></p>
            <div class="g-recaptcha" data-sitekey="6LfQpREUAAAAACGFu0kuaEUGa5Mj41IRc5GbClVI"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <button type="submit" class="btn btn-group btn-default btn-alert">Envoyer</button>
        </div>
    </div>
</form>
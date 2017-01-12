<?php require_once ('header.php'); ?>


<form action="../mot_de_passe_oublie.php" class="form-horizontal" method="post">

    <div class="form-group has-feedback">
        <label for="inputMail" class="col-sm-3 control-label">Saisissez votre adresse mail</label>
        <div class="col-sm-4">
            <input name="mail" type="text" class="form-control" id="inputMail" placeholder="mail@example.org" required>
            <i class="fa fa-envelope form-control-feedback"></i>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8">
            <button type="submit" class="btn btn-group btn-default">Envoyer</button>
        </div>
    </div>
</form>
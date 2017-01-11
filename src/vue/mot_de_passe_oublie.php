<?php require_once ('header.php'); ?>


    <form action="http://cv-direct.alwaysdata.net/src/controleur/mot_de_passe_oublie.php" class="form-horizontal">
        <div class="form-group has-feedback">
            <label for="inputMail" class="col-sm-3 control-label">Saisissez votre adresse mail</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputMail" placeholder="adresse mail" required>
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">

                <button type="submit" class="btn btn-group btn-default btn-animated">Envoyer<i class="fa fa-user"></i></button>
            </div>
        </div>
    </form>
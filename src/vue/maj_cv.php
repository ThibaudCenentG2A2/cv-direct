<?php
    require_once 'vue/header.php';
    echo '<br/>';
    echo $reponse;
?>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="main col-md-8 space-bottom">
                    <div class="contact-form">
                        <form action="../maj_cv?numero=<?php echo $_GET['numero'];?>" method="post" style="margin-left: 20px; color: black">
                            <label> Modifications CV </label> <br/> <br/>
                            <div class="form-group has-feedback">
                                <label> Nom </label>
                                <input type="text" class="form-control" name="nom"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" />
                            </div>
                            <div class="form-group has-feedback">
                                <label>Pseudonyme</label>
                                <input type="text" class="form-control" name="pseudo" />
                            </div>
                            <div class="form-group has-feedback">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Code Postal</label>
                                <input type="text" class="form-control" name="code_postal"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Ville</label>
                                <input type="text" class="form-control" name="ville"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Portable</label>
                                <input type="text" class="form-control" name="num_portable"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Fixe</label>
                                <input type="text" class="form-control" name="num_fixe"/>
                            </div>
                            <input type="submit" name="majcv" value="Enregistrer Modifications" class="submit-button btn btn-default"/>
                            <input type="submit" name="majcv" value="Annuler" class="submit-button btn btn-default"/>
                        </form>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </section>

<?php
    require_once 'vue/footer.php';
?>
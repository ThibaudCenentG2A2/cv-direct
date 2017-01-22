<?php
    require_once 'vue/header.php';
    echo '<br/>';
    echo $reponse;
?>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <!-- titre de la page -->
                <h1 class="page-title">Modifications du CV</h1>
                <div class="separator-2"></div>
                <div class="main col-md-8 space-bottom">
                    <div class="contact-form">
                        <form action="../maj_cv?numero=<?php echo $_GET['numero'];?>" method="post">
                            <label> Modifications CV </label> <br/> <br/>
                            <div class="form-group has-feedback">
                                <label> Nom </label>
                                <input type="text" class="form-control" name="nom" pattern="[A-Z]+"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" pattern="^[A-Z][a-z]+$" />
                            </div>
                            <div class="form-group has-feedback">
                                <label>Pseudonyme</label>
                                <input type="text" class="form-control" name="pseudo" pattern="^[A-Z][a-z]+[1-9]{2,5}$" />
                            </div>
                            <div class="form-group has-feedback">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse" pattern="^[A-Z][a-z]+|^[1-9]{1-4} [a-z]+ [A-Z]{1}[a-z]+ [A-Z]{1}[a-z]+"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Code Postal</label>
                                <input type="text" class="form-control" name="code_postal" pattern="[0-9]{5}"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Ville</label>
                                <input type="text" class="form-control" name="ville" pattern="[A-Z]+|[A-Z]+ [A-Z]+ [A-Z]+"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Portable</label>
                                <input type="text" class="form-control" name="num_portable" pattern="[0-9]{10}"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Fixe</label>
                                <input type="text" class="form-control" name="num_fixe" pattern="[0-9]{10}"/>
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
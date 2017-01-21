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
                        <form action="../creer_cv" method="post" enctype="multipart/form-data" style="margin-left: 20px; color: black">
                            <label> Création CV </label> <br/> <br/>
                            <div class="form-group has-feedback">
                                <label> Nom </label>
                                <input type="text" class="form-control" name="nom" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Pseudonyme</label>
                                <input type="text" class="form-control" name="pseudo" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Code Postal</label>
                                <input type="text" class="form-control" name="code_postal" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Ville</label>
                                <input type="text" class="form-control" name="ville" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Numéro de Sécurité Sociale</label>
                                <input type="number" class="form-control" name="num_secu_sociale" size="15" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Portable</label>
                                <input type="text" class="form-control" name="num_portable" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Fixe</label>
                                <input type="text" class="form-control" name="num_fixe"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Photographie</label>
                                <input type="file" class="form-control" name="photo"/>
                                <input type="hidden" name="max_size_photo" value="307200">
                            </div>
                            <div class="form-group has-feedback">
                                <label >Contrat Assurance Professionnel</label>
                                <input type="file" class="form-control" name="assurance" required/>
                                <input type="hidden" name="max_size_photo" value="307200">
                            </div>
                            <div class="form-group has-feedback">
                                <label >CV PDF</label>
                                <input type="file" class="form-control" name="cvpdf"/>
                                <input type="hidden" name="max_size_photo" value="307200">
                            </div>
                            <input type="submit" name="creer" value="Creer CV" class="submit-button btn btn-default"/>
                            <input type="submit" name="creer" value="Annuler" class="submit-button btn btn-default"/>
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
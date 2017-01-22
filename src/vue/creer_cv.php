<?php
    require_once 'vue/header.php';

    echo $reponse;
?>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <!-- titre de la page -->
                <h1 class="page-title">Création d'un nouveau CV</h1>
                <div class="separator-2"></div>
                <div class="main col-md-8 space-bottom">
                    <div class="contact-form">
                        <form action="../creer_cv" method="post" enctype="multipart/form-data">
                            <div class="form-group has-feedback">
                                <label> Nom </label>
                                <input type="text" class="form-control" name="nom" pattern="[A-Z]+" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" pattern="^[A-Z][a-z]+$" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Pseudonyme</label>
                                <input type="text" class="form-control" name="pseudo" pattern="^[A-Z][a-z]+[1-9]{2,5}$" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse" pattern="^[A-Z][a-z]+|^[1-9]{1-4} [a-z]+ [A-Z]{1}[a-z]+ [A-Z]{1}[a-z]+" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Code Postal</label>
                                <input type="text" class="form-control" name="code_postal" pattern="[0-9]{5}" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Ville</label>
                                <input type="text" class="form-control" name="ville" pattern="[A-Z]+|[A-Z]+ [A-Z]+ [A-Z]+" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Numéro de Sécurité Sociale</label>
                                <input type="number" class="form-control" name="num_secu_sociale" size="15" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Portable</label>
                                <input type="text" class="form-control" name="num_portable" pattern="[0-9]{10}" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Téléphone Fixe</label>
                                <input type="text" class="form-control" name="num_fixe" pattern="[0-9]{10}"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Photographie (Taille Maximale : 400 Ko, Formats Autorisés : JPG, JPEG, PNG)</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                                <input type="file" class="form-control" name="photo"/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >Contrat Assurance Professionnel (Taille Maximale : 400 Ko, Formats Autorisés : JPG, JPEG, PNG)</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                                <input type="file" class="form-control" name="assurance" required/>
                            </div>
                            <div class="form-group has-feedback">
                                <label >CV PDF (Taille Maximale : 400 Ko, Format Autorisé : PDF)</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                                <input type="file" class="form-control" name="cvpdf"/>
                            </div>
                            <div class="form-group has-feedback">
                                <h2>Compétences</h2>
                                <?php
                                $bd_cat = Competences::get_categories();
                                while ($categorie = $bd_cat->fetch())
                                {
                                    echo '
                        <p><strong>' . $categorie['NOM_COMPETENCE_CATEGORIE'] . '</strong></p>
                        <p>';

                                    $bd_cmpt = Competences::get_competences_depuis_categorie($categorie['ID_COMPETENCE_CATEGORIE']);
                                    while ($competence = $bd_cmpt->fetch())
                                    {
                                        echo "<input type='checkbox' name='competences[]' value='" . $competence['ID_COMPETENCE'] . "' id='". $competence['ID_COMPETENCE'] ."'> <label for='" . $competence['ID_COMPETENCE'] . "'>" . $competence['NOM_COMPETENCE'] . "</label><br/>";
                                    }

                                    echo '</p>
';
                                }
                                ?>
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
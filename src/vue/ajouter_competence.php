<?php

require_once 'vue/header.php';

?>

    <section class="main-container">

        <div class="container">
            <div class="row">

                <!-- debut conteneur -->
                <div class="main col-md-12">
                    <?php

                    if (isset($alert) && $alert == 1)
                        echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Attention : la catégorie que vous avez sélectionnée n\'existe pas. Veuillez en choisir une autre.</div>';
                    if (isset($alert) && $alert == 2)
                        echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Les nouvelles compétences ont été ajoutées avec succès.</div>';

                    ?>
                    <!-- titre de la page -->
                    <h1 class="page-title">Ajout de compétences</h1>
                    <div class="separator-2"></div>

                    <!-- descriptif de la page -->
                    <p>Ajoutez ici de nouvelles compétences, séparées par une virgule, sélectionnables ensuite par les
                        Recruteurs pour étoffer les CV de la base.</p>

                    <!-- formulaire -->
                    <div class="contact-form">
                        <form method="POST" action="ajouter_competence">
                            <div class="form-group has-feedback">
                                <label for="categorie">Catégorie où enregistrer</label>
                                <select class="form-control" name="categorie"><?php

                                    $req = Competences::get_categories();
                                    while ($data = $req->fetch())
                                        echo '<option value="' . $data['ID_COMPETENCE_CATEGORIE'] . '">' . $data['NOM_COMPETENCE_CATEGORIE'] . '</option>';

                                    ?>
                                </select>
                                <i class="fa fa-gears form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="competences">Competences</label>
                                <textarea class="form-control" rows="6" id="competences" name="competences"
                                          placeholder="PHP, C++, LaTeX..."><?php echo isset($competences_form) && isset($alert) && ($alert != 2) ? $competences_form : null; ?></textarea>
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="submit" name="ValidButton" value="Ajouter" class="submit-button btn btn-default">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- main-container end -->

<?php

require_once 'vue/footer.php';
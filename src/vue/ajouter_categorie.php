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
                        echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>La catégorie existe déjà.</div>';
                    else if (isset($alert) && $alert == 2)
                        echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Catégorie ajoutée avec succès.</div>';
                    ?>
                    <div class="space-bottom">
                        <!-- titre de la page -->
                        <h1 class="page-title">Ajout de catégorie de compétences</h1>
                        <div class="separator-2"></div>

                        <!-- descriptif de la page -->
                        <p>Ajouter le nom d'une nouvelle catégorie pour trier les compétences.</p>
                    </div>

                    <!-- formulaire -->
                    <div class="contact-form">
                        <form method="post" action="ajouter_categorie">
                            <div class="form-group has-feedback">
                                <label for="categorie">Catégorie</label>
                                <input class="form-control" id="categorie" name="categorie" placeholder="ex : Développement web" <?php echo isset($alert) && $alert == 1 ? "value=\"".$categorie."\"" : null ?>required>
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
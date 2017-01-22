<?php

require_once 'vue/header.php';

require_once 'modele/Competences.php';

?>

    <section class="main-container">

        <div class="container">
            <div class="row">

                <!-- debut conteneur -->
                <div class="main col-md-12">
                    <!-- titre de la page -->
                    <h1 class="page-title">Liste des compétences</h1>
                    <div class="separator-2"></div>

                    <!-- descriptif de la page -->

                    <div class="space-bottom">
                        <p>Liste des catégories et compétences associées, à ajouter aux CV enregistrés. L'ajout d'une catégorie ou compétence ne se fait que par l'action d'un administrateur.</p>
                    </div>

                    <?php

                    $bd_cat = Competences::get_categories();
                    while ($categorie = $bd_cat->fetch())
                    {
                        echo '
                        <h2>' . $categorie['NOM_COMPETENCE_CATEGORIE'] . '</h2>
                        <p>';

                        $bd_cmpt = Competences::get_competences_depuis_categorie($categorie['ID_COMPETENCE_CATEGORIE']);
                        while ($competence = $bd_cmpt->fetch())
                        {
                            echo $competence['NOM_COMPETENCE'] . ' ';
                        }

                        echo '</p>
';
                    }

                    ?>
                </div>

            </div>
        </div>
    </section>
    <!-- main-container end -->


<?php

require_once 'vue/footer.php';
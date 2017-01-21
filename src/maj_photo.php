<?php
    /**
     * Contrôleur sur la modification de la photo qui va réagir différement sur la vue en fonction si la personne concernée par le CV a une photo ou non.
     * @author Thibaud CENENT
     * @version 1.0
     */
    require_once 'modele/BD.php';
    require_once 'modele/CV.php';
    require_once 'modele/PieceJointe.php';
    $id_cv = $_GET['numero'];
    if(isset($_GET['idpj']))
    {
        $id_piece_jointe = $_GET['idpj'];
        $photo = PieceJointe::afficher($id_piece_jointe);
        require_once 'vue/maj_photo.php';
    }
    require_once 'vue/maj_photo.php';

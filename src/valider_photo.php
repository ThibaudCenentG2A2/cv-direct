<?php
    /** Contrôleur permettant l'affichage de la photo et de s'adapter en fonction de si le recruteur souhaite valider le choix de cette photo ou non.
     * @author Thibaud CENENT
     * @version 1.0
     */

    require_once 'gestion_action_utilisateur.php';
    require_once 'gestion_cv_pieces_jointes.php';
    require_once 'modele/BD.php';
    require_once 'modele/PieceJointe.php';
    require_once 'modele/CV.php';

    if($_POST['maj_photo'] == 'Choisir Photo')
    {
        if(isset($_GET['idpj'])) // Si il existe déja une photo sur le CV dans la BD que l'on souhaite modifier
        {
            if(upload_piece_jointe($_GET['numero'], 'photo') == false)
                header('Location: maj_photo?numero=' . $_GET['numero'] . '&idpj=' . $_GET['idpj'] . '&reponse=16');
            $id_piece_jointe_actuelle = $_GET['idpj'];
            $nouvelle_photo = PieceJointe::get_photo_provisoire($_GET['numero'], $id_piece_jointe_actuelle); // On récupére la photo provisoire pour l'affichage en attendant la confirmation du recruteur
            require_once 'vue/valider_photo.php';
        }
        else
        {
            if (upload_piece_jointe($_GET['numero'], 'photo') == false)
                header('Location : maj_photo?numero=' . $_GET['numero'] . '&reponse=16');
            $cv_actuel = CV::afficher($_GET['numero']); // On initialise un objet CV afin de pouvoir accéder à l'identifiant de la photo provisoire insérée dans la BD et upload sur le serveur
            $photo_provisoire = $cv_actuel->get_piece_jointe('PhotoCV');
            require_once 'vue/valider_photo.php';
        }

    }
    else if($_POST['maj_photo'] == 'Annuler')
        header('Location: afficher_cv?numero=' . $_GET['numero']);

    else if($_POST['valider'] == 'Oui')
    {
        $id_photo = $_GET['idpj'];
        if(PieceJointe::get_photo_provisoire($_GET['numero'], $id_photo) == null) // Si il s'agissait de la première photo pour un CV qu'on uploadé
            header('Location: afficher_cv?numero=' . $_GET['numero'] . '&reponse=17');
        // On supprime la photo initiale mise sur le serveur et la BD pour respecter le changement de photo
        $id_photo_par_defaut = PieceJointe::get_photo_provisoire($_GET['numero'], $id_photo)->get_id_piece_jointe();
        unlink("cv/pieces_jointe/". PieceJointe::afficher($id_photo_par_defaut)->get_token() . "." . PieceJointe::afficher($id_photo_par_defaut)->get_extension());
        PieceJointe::supprimer($id_photo_par_defaut);
        header('Location: afficher_cv?numero=' . $_GET['numero'] . '&reponse=17');
    }
    else if($_POST['valider'] == 'Non')
    {
       $id_photo = $_GET['idpj'];
       if(PieceJointe::get_photo_provisoire($_GET['numero'], $id_photo) == null) // Si il s'agissait de la première photo pour un CV qu'on uploade
       {
           unlink("cv/pieces_jointe/". PieceJointe::afficher($id_photo)->get_token() . "." . PieceJointe::afficher($id_photo)->get_extension());
           PieceJointe::supprimer($id_photo);
           header('Location: maj_photo?numero=' . $_GET['numero']);
       }
       else
       {
           // On supprime la photo provisoire de la BD et du serveur et on se redirige vers le contrôleur maj_cv avec à l'affichage la photo initiale qu'on souhaitait modifier
           unlink("cv/pieces_jointe/". PieceJointe::afficher($id_photo)->get_token() . "." . PieceJointe::afficher($id_photo)->get_extension());
           $id_photo_par_defaut = PieceJointe::get_photo_provisoire($_GET['numero'], $id_photo)->get_id_piece_jointe();
           PieceJointe::supprimer($id_photo);
           header('Location: maj_photo?numero=' . $_GET['numero'] . '&idpj=' . $id_photo_par_defaut);
       }
    }

<?php

require_once 'modele/BD.php';

class Competences
{

    public static function get_competences() {

        return BD::getInstance()->query('SELECT ID_COMPETENCE_CATEGORIE, NOM_COMPETENCE_CATEGORIE
                                          FROM COMPETENCE_CATEGORIE
                                          ORDER BY NOM_COMPETENCE_CATEGORIE');

    }

    /**
     * Recherche si la catégorie donnée en paramètre existe bien dans la base de données
     * @param $categorie
     * @return bool
     */
    public static function categorie_existe($categorie) {

        $req = BD::getInstance()->prepare('SELECT COUNT(*) AS TOTAL FROM COMPETENCE_CATEGORIE WHERE NOM_COMPETENCE_CATEGORIE = :nom_categorie');
        $req->execute(array('nom_categorie' => $categorie));
        $data = $req->fetch();
        return $data['TOTAL'];
    }
}
<?php

require_once 'modele/BD.php';

class Competences
{
    /**
     * Fonction pour aller chercher en BD la liste complète des catégories
     * @return PDOStatement La liste des catégories
     */
    public static function get_categories()
    {

        return BD::getInstance()->query('SELECT ID_COMPETENCE_CATEGORIE, NOM_COMPETENCE_CATEGORIE
                                          FROM COMPETENCE_CATEGORIE
                                          ORDER BY NOM_COMPETENCE_CATEGORIE');

    }

    /**
     * Recherche si la catégorie donnée en paramètre existe bien dans la base de données
     * @param int $categorie Le numéro de la catégorie à tester
     * @return bool Renvoie true si présente en BD, false sinon
     */
    public static function categorie_existe($categorie)
    {

        $req = BD::getInstance()->prepare('SELECT COUNT(*) AS TOTAL
                                            FROM COMPETENCE_CATEGORIE
                                            WHERE ID_COMPETENCE_CATEGORIE = :id_categorie
                                            ORDER BY NOM_COMPETENCE_CATEGORIE');
        $req->execute(array('id_categorie' => intval($categorie)));
        $data = $req->fetch();
        return $data['TOTAL'];
    }


    /**
     * @param $id_categorie
     * @return PDOStatement
     */
    public static function get_competences_depuis_categorie($id_categorie) {
        $req = BD::getInstance()->prepare('SELECT NOM_COMPETENCE
                                            FROM COMPETENCE 
                                            WHERE ID_COMPETENCE_CATEGORIE = :id_categorie 
                                            ORDER BY NOM_COMPETENCE');
        $req->execute(array('id_categorie' => $id_categorie));
        return $req;

    }
}
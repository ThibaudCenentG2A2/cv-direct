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


    /**
     * @param string[] $competences Liste des compétences à ajouter
     * @param int $categorie Numéro de la catégorie
     */
    public static function ajouter_les_competences($competences, $categorie)
    {
        foreach ($competences as $competence) {
            if(self::competence_existe($competence))
                continue;
            $ins = BD::getInstance()->prepare('INSERT INTO COMPETENCE (NOM_COMPETENCE, ID_COMPETENCE_CATEGORIE) VALUES (:competence, :categorie)');
            $ins->execute(array("competence" => $competence, "categorie" => $categorie));
        }
    }



    /**
     * Fonction testant l'existence du nom de la compétence dans la BD
     * @param string $competence Chaîne de la compétence à chercher
     * @return bool Retourne true si le paramètre competence existe dans la BD, false sinon
     */
    public static function competence_existe($competence) {
        $req = BD::getInstance()->prepare('SELECT COUNT(*) AS TOTAL FROM COMPETENCE WHERE NOM_COMPETENCE = :nom_competence');
        $req->execute(array("nom_competence" => $competence));
        $data = $req->fetch();
        return $data['TOTAL'] > 0;
    }
}
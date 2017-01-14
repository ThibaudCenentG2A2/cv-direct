<?php

/**
 * Création de la classe CV_PDF correspondant à un CV au format PDF qu'un recruteur ajoutera pour le CV d'une personne concernée
 * @author Thibaud CENENT
 * @version 1.4
 */

class CVPDF
{
    /** Correspond à l'identifiant d'un CV au format PDF pour un CV d'une personne concernée
     * @var $id_cv_pdf
     * @see CVPDF::get_id_cv_pdf()
     */
    private $id_cv_pdf;

    /** Correspond à un CV pour une personne qui admet un unique CV au format PDF
     * @var $id_CV
     * @see CVPDF::get_id_cv()
     */
    private $id_cv;


    /** Constructeur de la classe CV PDF
     * @param $id_cv_pdf
     * @param $id_cv
     */
    public function __construct($id_cv_pdf, $id_cv)
    {
        $this->id_cv_pdf = $id_cv_pdf;
        $this->id_cv = $id_cv;
    }

    /** Retourne l'identifiant d'un CV_PDF ooncerné
     * @return $this->id_cv_pdf
     */
    public function get_id_cv_pdf()
    {
        return $this->id_cv_pdf;
    }

    /** Retourne l'identifiant d'un CV contenant le CV PDF concerné
     * @return $this->id_cv
     */
    public function get_id_cv()
    {
        return $this->id_cv;
    }

    /** Réalise la création d'un CV PDF grâce à la requête INSERT et retourne l'identifiant du CV PDF généré
     * @param $id_cv
     * @return string
     */
    public static function creer($id_cv)
    {
        $req = BD::getInstance()->prepare('INSERT INTO CV_PDF (ID_CV) VALUES(:id_cv)');
        $req->execute(array('id_cv' => $id_cv));
        $id_cv_pdf_cree = BD::getInstance()->lastInsertId();
        return $id_cv_pdf_cree;
    }

    /**
     * Supprime le CV_PDF associé au CV de la personne concernée dans la BD.
     * @param $id_cv_pdf
     */
    public static function supprimer($id_cv_pdf)
    {
        $req = BD::getInstance()->prepare('DELETE FROM CV_PDF WHERE ID_CV_PDF = :id_cv_pdf');
        $req->execute(array('id_cv_pdf' => $id_cv_pdf));
    }
}
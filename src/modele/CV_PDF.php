<?php

namespace nsCV;

/**
 * Création de la classe CV_PDF correspondant à un CV au format PDF qu'un recruteur ajoutera pour le CV d'une personne concernée
 * @author Thibaud CENENT
 * @version 1.2
 * @package nsCV correspondant à l'espace de noms où se déroulera la gestion des CV
 */
class CV_PDF
{
    /** Correspond à l'identifiant d'un CV au format PDF pour un CV d'une personne concernée
     * @var $id_CV_PDF
     * @see CV_PDF::getIdCVPDF()
     */
    private $id_CV_PDF;

    /** Correspond à un CV pour une personne qui admet un unique CV au format PDF
     * @var $id_CV
     * @see CV_PDF::getCV()
     */
    private $id_CV;

    /**
     * Constructeur de la classe CV_PDF
     * @param $id_CV_PDF
     * @param $id_CV
     */

    /** Correspond au numéro de création du CV_PDF associé à un CV en particulier
     * @var $numero_Creation_CV_PDF
     * @see CV_PDF::get_numero_creation_cv_pdf()
     */
    private $numero_Creation_CV_PDF;

    public function __construct($id_CV_PDF, $id_CV)
    {
        $this->id_CV_PDF = $id_CV_PDF;
        $this->id_CV = $id_CV;
    }

    /** Retourne l'identifiant d'un CV_PDF ooncerné
     * @return $this->id_CV_PDF
     */
    public function get_id_cv_pdf()
    {
        return $this->id_CV_PDF;
    }

    /** Retourne l'identifiant d'un CV contenant le CV PDF concerné
     * @return $this->id_CV
     */
    public function get_id_cv()
    {
        return $this->id_CV;
    }

    /** Retourne le numéro de création du CV_PDF par rapport au CV associé
     * @return mixed
     */
    public function get_numero_creation_cv_pdf()
    {
        return $this->numero_Creation_CV_PDF;
    }


    /**
     *  Permet de créer ou d'ajouter un CV_PDF associé au CV d'une personne concerné.
     */
    public function creer()
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO CV_PDF (ID_CV) VALUES(:id_cv)');
        $req->execute(array('id_cv' => $this->get_id_cv()));
        $id_CV_PDF_Cree = $GLOBALS['pdo']->lastInsertId();
        return $id_CV_PDF_Cree;
    }

    /** Retourne le CV_PDF à afficher.
     * @return \nsCV\CV_PDF
     */
    public function afficher()
    {
        $req = $GLOBALS['pdo']->prepare('SELECT * FROM CV_PDF WHERE ID_CV_PDF = :id_cv_pdf AND ID_CV = :id_cv');
        $req->execute(array('id_cv_pdf' => $_SESSION['id_cv_pdf'], 'id_cv' => $_SESSION['id_cv']));
        $donnees = $req->fetch();
        return new CV_PDF($donnees['ID_CV_PDF'], null);
    }

    /**
     * Supprime le CV_PDF associé au CV de la personne concernée dans la BD.
     */
    public function supprimer()
    {
        $req = $GLOBALS['pdo']->prepare('DELETE FROM CV_PDF WHERE ID_CV_PDF = :id_cv_pdf AND ID_CV = :id_cv');
        $req->execute(array('id_cv_pdf' => $this->get_id_cv_pdf(), 'id_cv' => $this->get_id_cv()));
    }

    /** Retourne le numéro de création du CV_PDF associé à un CV particulier
     * @return mixed
     */
    public function get_numero_creation()
    {
        $req = $GLOBALS['pdo']->prepare('SELECT COUNT(ID_CV_PDF) AS nbre_CV_PDF FROM CV_PDF WHERE ID_CV = :id_cv');
        $req->execute(array('id_cv' => $this->get_id_cv()));
        $donnees = $req->fetch();
        $this->numero_Creation_CV_PDF = $donnees['nbre_CV_PDF'];
        return $this->get_numero_creation_cv_pdf();
    }







}
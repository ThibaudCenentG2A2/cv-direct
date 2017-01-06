<?php
namespace nsCVUser;

/**
 * Class CV correspondant à un CV ajouté par un utilisateur
 * @package nsCVUser correpondant au namespace où on va traiter la gestion des CV
 * @author Thibaud CENENT
 * @version 1.2
 */
class CV
{
    /**
     * Correspond à l'identifiant d'un CV auto incrémentable
     * @var $id_CV
     * @see CV::getIdCV()
     */
    private $id_CV;

    /**
     * Correspond au numéro de sécurité sociale d'un utilisateur
     * @var $numero_Secu_Sociale
     * @see CV::getNumeroSecuSociale()
     */
    private $numero_Secu_Sociale;

    /**
     * Correspond à un contrat qui permet l'indémnité et l'assurance d'un utilisateur
     * @var $contrat_Assurance_Professionnel
     * @see CV::getContratAssuranceProfessionnel()
     */
    private $contrat_Assurance_Professionnel;


    /**
     * Correspond au numéro de tel portable de l'utilisateur
     * @var $num_Tel_Portable
     * @see CV::getNumTelPortable()
     * @see CV::setNumTelPortable()
     */
    private $num_Tel_Portable;

    /**
     * Correspond au numéro de tel fixe de l'utilisateur
     * @var $num_Tel_Fixe
     * @see CV::getNumTelFixe()
     * @see CV::setNumTelFixe()
     */
    private $num_Tel_Fixe;

    /**
     * Correspond à l'adresse d'un utilisateur
     * @var $adresse
     * @see CV::getAdresse()
     * @see CV::setAdresse()
     */
    private $adresse;

    /**
     * Correspond au code postal d'un utilisateur
     * @var $code_Postal
     * @see CV::getCodePostal()
     * @see CV::setCodePostal()
     */
    private $code_Postal;

    /**
     * Correspond à la ville où habite un utilisateur
     * @var $ville
     * @see CV::getVille()
     * @see CV::setVille()
     */
    private $ville;


    /** Constructeur de la classe CV
     *
     * @param $id_CV
     * @param $numero_Secu_Sociale
     * @param $contrat_Assurance_Professionnel
     * @param $num_Tel_Portable
     * @param $num_Tel_Fixe
     * @param $adresse
     * @param $code_Postal
     * @param $ville
     */
    public function __construct($id_CV, $numero_Secu_Sociale, $contrat_Assurance_Professionnel, $num_Tel_Portable,
                                $num_Tel_Fixe, $adresse, $code_Postal, $ville)
    {
        $this->id_CV = $id_CV;
        $this->numero_Secu_Sociale = $numero_Secu_Sociale;
        $this->contrat_Assurance_Professionnel = $contrat_Assurance_Professionnel;
        $this->num_Tel_Portable = $num_Tel_Portable;
        $this->num_Tel_Fixe = $num_Tel_Fixe;
        $this->adresse = $adresse;
        $this->code_Postal = $code_Postal;
        $this->ville = $ville;
    }


    /** Retourne l'identifiant d'un CV
     * @return mixed
     */
    public function get_id_cv()
    {
        return $this->id_CV;
    }

    /** Retourne le numéro de sécurité sociale de l'utilisateur
     * @return mixed
     */
    public function get_numero_secu_sociale()
    {
        return $this->numero_Secu_Sociale;
    }


    /** Retourne le contrat d'assurance professionnel de l'utilisateur
     * @return mixed
     */
    public function get_contrat_assurance_professionnel()
    {
        return $this->contrat_Assurance_Professionnel;
    }


    /** Retourne le numéro de téléphone portable de l'utilisateur
     * @return mixed
     */
    public function get_num_tel_portable()
    {
        return $this->num_Tel_Portable;
    }

    /** Retourne le numéro de tel fixe de l'utilisateur
     * @return mixed
     */
    public function get_num_tel_fixe()
    {
        return $this->num_Tel_Fixe;
    }

    /** Retourne l'adresse de l'utilisateur
     * @return mixed
     */
    public function get_adresse()
    {
        return $this->adresse;
    }

    /** Retourne le code postal d'un utilisateur
     * @return mixed
     */
    public function get_code_postal()
    {
        return $this->code_Postal;
    }

    /** Retourne la ville d'un utilisateur
     * @return mixed
     */
    public function get_ville()
    {
        return $this->ville;
    }

    /** Fonction qui va permettre de d'insérer des CV pour chaque CV crée en fonction de chaque utilisateur
     */
    public function inserer()
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO CV(NUMERO_SECU_SOCIALE,CONTRAT_ASSURANCE_PROFESSIONNEL,CV_FORMAT_PDF
        ,NUM_TEL_PORTABLE,NUM_TEL_FIXE,ADRESSE,CODE_POSTAL,VILLE,PHOTOGRAPHIE) VALUES(:secu,:assurance,:cv,:portable
        ,:fixe,:adresse,:code_postal,:ville,:photo)');
        //$req->execute(array('secu' => ));
        echo 'Insertion bien réalisé';
    }

    /** Fonction qui va effectuer une mise à jour sur un cv en particulier grâce à la requête UPDATE
     *
     */
    public function mettre_a_jour()
    {
        /**
         * On réalise plusieurs conditions car grâce à la page validate_update.php, on va travailler sur une donnée en particulier à modifier à chaque fois donc on suppose que les autres variables sont à null.
         */
        /*
        if(isset($assurance))
        {
            $req = $bd->prepare('UPDATE CV SET CONTRAT_ASSURANCE_PROFESSIONNEL = :assurance WHERE ID_CV = :id_cv');
            $req->execute(array('assurance' => $assurance, 'id_cv' => $id_cv));
        }
        if(isset($cv_pdf))
        {
            $req = $bd->prepare('UPDATE CV SET CV_FORMAT_PDF = :cv_pdf WHERE ID_CV = :id_cv');
            $req->execute(array('cv_pdf' => $cv_pdf, 'id_cv' => $id_cv));
        }
        if(isset($photo))
        {
            $req = $bd->prepare('UPDATE CV SET PHOTOGRAPHIE = :photo WHERE ID_CV = :id_cv');
            $req->execute(array('photo' => $photo, 'id_cv' => $id_cv));
        }
        if(isset($num_portable))
        {
            $req = $bd->prepare('UPDATE CV SET NUM_TEL_PORTABLE = :portable WHERE ID_CV = :id_cv');
            $req->execute(array('portable' => $num_portable, 'id_cv' => $id_cv));
        }
        if(isset($num_fixe))
        {
            $req = $bd->prepare('UPDATE CV SET NUM_TEL_FIXE = :fixe WHERE ID_CV = :id_cv');
            $req->execute(array('fixe' => $num_fixe, 'id_cv' => $id_cv));
        }
        if(isset($adresse))
        {
            $req = $bd->prepare('UPDATE CV SET ADRESSE = :adresse WHERE ID_CV = :id_cv');
            $req->execute(array('adresse' => $adresse, 'id_cv' => $id_cv));
        }
        if(isset($code_postal))
        {
            $req = $bd->prepare('UPDATE CV SET CODE_POSTAL = :code_postal WHERE ID_CV = :id_cv');
            $req->execute(array('code_postal' => $code_postal, 'id_cv' => $id_cv));
        }
        if(isset($ville))
        {
            $req = $bd->prepare('UPDATE CV SET VILLE = :ville WHERE ID_CV = :id_cv');
            $req->execute(array('ville' => $ville, 'id_cv' => $id_cv));
        }*/
    }

    /** Fonction qui va permettre la suppression d'un tuple dans la relation CV ayant un identifiant et un utilisateur en particulier grâce à la requête DELETE.
     *
     */
    public function supprimer()
    {
        $req = $GLOBALS['pdo']->prepare('DELETE FROM CV WHERE ID_CV = : id_cv');
        // $req->execute(array('id_cv' => $id_cv));
    }

    /** Fonction qui va permettre d'afficher un cv d'un utilisateur en fonction de son identifiant grâce aux données récupérées grâce à la requête SELECT
     * @return CV
     * Retourne le cv correspondant à l'identifiant passé en paramètre
     */
    public function afficher()
    {
        $GLOBALS['pdo']->prepare('SELECT * FROM CV WHERE ID_CV = :id_cv ');
    }



}

/*function afficher_tous_les_cv()
{
    $req = $bd->prepare('SELECT * FROM CV ORDER BY ID_CV ASC');
    $req->execute(array());
    $cv_arrays = array();
    while($row = $req->fetch())
    {
        $cv_arrays[] = new CV($row['ID_CV'], $row['NUMERO_SECU_SOCIALE'],$row['CONTRAT_ASSURANCE_PROFESSIONNEL'],$row['CV_FORMAT_PDF']
            ,$row['NUM_TEL_PORTABLE'],$row['NUM_TEL_FIXE'],$row['ADRESSE'],$row['CODE_POSTAL'],$row['VILLE'],$row['PHOTOGRAPHIE']);
    }
    return $cv_arrays;
}*/
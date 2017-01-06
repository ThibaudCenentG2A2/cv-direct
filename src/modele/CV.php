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
     */
    private $num_Tel_Portable;

    /**
     * Correspond au numéro de tel fixe de l'utilisateur
     * @var $num_Tel_Fixe
     * @see CV::getNumTelFixe()
     */
    private $num_Tel_Fixe;

    /**
     * Correspond à l'adresse d'un utilisateur
     * @var $adresse
     * @see CV::getAdresse()
     */
    private $adresse;

    /**
     * Correspond au code postal d'un utilisateur
     * @var $code_Postal
     * @see CV::getCodePostal()
     */
    private $code_Postal;

    /**
     * Correspond à la ville où habite un utilisateur
     * @var $ville
     * @see CV::getVille()
     */
    private $ville;

    /**
     * Correspond au nom de la personne concernée par le CV
     * @var $nom
     * @see CV::getNom()
     */
    private $nom;

    /**
     * Correspond au prénom de la personne concernée par le CV
     * @var $prenom
     * @see CV::getPrenom()
     */
    private $prenom;


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

    /** Retourne le nom de la personne concernée par le CV
     * @return mixed
     */
    public function get_nom()
    {
        return $this->nom;
    }

    /** Retourne le prénom de la personne concernée par le CV
     * @return mixed
     */
    public function get_prenom()
    {
        return $this->prenom;
    }


    /** Fonction qui va permettre de d'insérer des CV pour chaque CV crée en fonction de chaque utilisateur
     */
    public function inserer()
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO CV(NUMERO_SECU_SOCIALE,NUM_TEL_PORTABLE,CONTRAT_ASSURANCE_PROFESSIONNEL,NUM_TEL_FIXE,ADRESSE,CODE_POSTAL
        ,VILLE,NOM,PRENOM) VALUES(:num_secu,:num_portable,:contrat_assurance_pro,:num_fixe,:adresse,:code_postal,:ville,:nom,:prenom)');
        $req->execute(array('num_secu' => $this->numero_Secu_Sociale, 'num_portable' => $this->num_Tel_Portable, 'contrat_assurance_pro'
        => $this->contrat_Assurance_Professionnel, 'num_fixe' => $this->num_Tel_Fixe, 'adresse' => $this->adresse, 'code_postal'
        => $this->code_Postal, 'ville' => $this->ville, 'nom' => $this->nom, 'prenom' => $this->prenom));
        echo 'Insertion bien réalisé';
    }

    /** Fonction qui va effectuer une mise à jour sur un cv en particulier grâce à la requête UPDATE
     *
     */
    public function mettre_a_jour()
    {

    }

    /** Fonction qui va permettre la suppression d'un tuple dans la relation CV ayant un identifiant et un utilisateur en particulier grâce à la requête DELETE.
     *
     */
    public function supprimer()
    {
        $req = $GLOBALS['pdo']->prepare('DELETE FROM CV WHERE ID_CV = : id_cv');
        $req->execute(array('id_cv' => $this->id_CV));
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
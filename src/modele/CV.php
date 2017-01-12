<?php

require 'BD.php';

/**
 * Class CV correspondant à un CV créé par un recruteur
 * @author Thibaud CENENT
 * @version 1.5
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
     * Correspond au numéro de sécurité sociale de la personne concernée dans le CV
     * @var $numero_Secu_Sociale
     * @see CV::getNumeroSecuSociale()
     */
    private $numero_Secu_Sociale;

    /**
     * Correspond au numéro de tel portable de la personne concernée dans le CV
     * @var $num_Tel_Portable
     * @see CV::getNumTelPortable()
     */
    private $num_Tel_Portable;

    /**
     * Correspond au numéro de tel fixe de la personne concernée dans le CV
     * @var $num_Tel_Fixe
     * @see CV::getNumTelFixe()
     */
    private $num_Tel_Fixe;

    /**
     * Correspond à l'adresse de la personne concernée par le CV
     * @var $adresse
     * @see CV::getAdresse()
     */
    private $adresse;

    /**
     * Correspond au code postal de la personne concernée par le CV
     * @var $code_Postal
     * @see CV::getCodePostal()
     */
    private $code_Postal;

    /**
     * Correspond à la ville où habite la personne concernée par le CV
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

    /**
     * Correspond à une liste de compétences pour lesquelles la personne concernée sur le CV est compétente
     * @var $liste_Competences
     */
    private $liste_Competences = array();

    /**
     * Correspond à la liste de CV PDF associé à la personne concernée sur le CV
     * @var $liste_CV_PDF
     */
    private $liste_CV_PDF = array();

    /** Correspond à une liste de pieces jointe associées à un CV
     * @var array | Piece_Jointe
     */
    private $liste_pieces_jointe = array();

    /**
     * Correspond au nombre de CV à afficher par page
     * @var int
     */
    const cv_Par_Page = 10;

    /** Constructeur de la classe CV
     * @param $id_CV
     * @param $numero_Secu_Sociale
     * @param $num_Tel_Portable
     * @param $num_Tel_Fixe
     * @param $adresse
     * @param $code_Postal
     * @param $ville
     * @param $nom
     * @param $prenom
     */
    public function __construct($id_CV, $numero_Secu_Sociale, $num_Tel_Portable, $num_Tel_Fixe, $adresse,
                                $code_Postal, $ville, $nom, $prenom)
    {
        $this->id_CV = $id_CV;
        $this->numero_Secu_Sociale = $numero_Secu_Sociale;
        $this->num_Tel_Portable = $num_Tel_Portable;
        $this->num_Tel_Fixe = $num_Tel_Fixe;
        $this->adresse = $adresse;
        $this->code_Postal = $code_Postal;
        $this->ville = $ville;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }


    /** Retourne l'identifiant d'un CV
     * @return $this->id_CV
     */
    public function get_id_cv()
    {
        return $this->id_CV;
    }

    /** Retourne le numéro de sécurité sociale de l'utilisateur
     * @return $this->numero_Secu_Sociale
     */
    public function get_numero_secu_sociale()
    {
        return $this->numero_Secu_Sociale;
    }


    /** Retourne le numéro de téléphone portable de l'utilisateur
     * @return $this->num_Tel_Portable
     */
    public function get_num_tel_portable()
    {
        return $this->num_Tel_Portable;
    }

    /** Retourne le numéro de tel fixe de l'utilisateur
     * @return $this->num_Tel_Fixe
     */
    public function get_num_tel_fixe()
    {
        return $this->num_Tel_Fixe;
    }

    /** Retourne l'adresse de l'utilisateur
     * @return $this->adresse
     */
    public function get_adresse()
    {
        return $this->adresse;
    }

    /** Retourne le code postal d'un utilisateur
     * @return $this->code_Postal
     */
    public function get_code_postal()
    {
        return $this->code_Postal;
    }

    /** Retourne la ville d'un utilisateur
     * @return $this->ville
     */
    public function get_ville()
    {
        return $this->ville;
    }

    /** Retourne le nom de la personne concernée par le CV
     * @return $this->nom
     */
    public function get_nom()
    {
        return $this->nom;
    }

    /** Retourne le prénom de la personne concernée par le CV
     * @return $this->prenom
     */
    public function get_prenom()
    {
        return $this->prenom;
    }


    /** Retourne la liste des CV_PDF pour un CV en particulier
     * @return array| CV_PDF
     */
    public function getListeCVPDF()
    {
        return $this->liste_CV_PDF;
    }

    /**
     * @return array| Piece_Jointe
     */
    public function get_liste_pieces_jointe()
    {
        return $this->liste_pieces_jointe;
    }

    /**
     * Ajoute tous les CV_PDF associés à un CV pour une personne concernée
     */
    public function ajouter_cv_pdf()
    {
        $req = BD::getInstance()->prepare('SELECT * FROM CV_PDF WHERE ID_CV = :id_cv');
        $req->execute(array('id_cv' => $_SESSION['id_cv']));
        while ($donnees = $req->fetch()) {
            $this->liste_CV_PDF[] = new CV_PDF($donnees['ID_CV_PDF'], $_SESSION['id_cv']);
        }
    }

    /** Ajoute toutes les pieces jointes associes à un CV pour une personne concernée
     *
     */
    public function ajouter_pieces_jointes()
    {
        $req = BD::getInstance()->prepare('SELECT * FROM PIECE_JOINTE WHERE ID_CV = :id_cv');
        $req->execute(array('id_cv' => $this->get_id_cv()));
        while($donnees = $req->fetch())
            $this->liste_pieces_jointe[] = new Piece_Jointe($donnees['ID_PIECE_JOINTE'], $this->get_id_cv(), $donnees['TYPE'],
                $donnees['EXTENSION'], $donnees['TOKEN']);
    }

    /** Retourne sous la forme d'une String le CV et son identifiant
     * @return string
     */
    public function __toString()
    {
        return "CV N° : " . $this->get_id_cv();
    }


    /** Fonction qui va permettre de d'insérer des CV pour chaque CV créé en fonction de chaque utilisateur
     */
    public function inserer()
    {
        $req = BD::getInstance()->prepare('INSERT INTO CV(NUMERO_SECU_SOCIALE, NUM_TEL_PORTABLE, NUM_TEL_FIXE, ADRESSE, CODE_POSTAL
        , VILLE, NOM, PRENOM) VALUES(:num_secu, :num_portable, :num_fixe, :adresse,
        :code_postal, :ville, :nom, :prenom)');
        $req->execute(array('num_secu' => $this->numero_Secu_Sociale, 'num_portable' => $this->num_Tel_Portable,
            'num_fixe' => $this->num_Tel_Fixe, 'adresse' => $this->adresse, 'code_postal' => $this->code_Postal,
            'ville' => $this->ville, 'nom' => $this->nom, 'prenom' => $this->prenom));
        echo 'Insertion bien réalisé';
        $id_CV_Initialise = $GLOBALS['pdo']->lastInsertId();
        return $id_CV_Initialise;
    }

    /** Fonction qui va effectuer une mise à jour sur un cv en particulier grâce à la requête UPDATE

     */
    public function mettre_a_jour()
    {
        if (isset($this->num_Tel_Portable)) {
            $req = BD::getInstance()->prepare('UPDATE CV SET NUM_TEL_PORTABLE = :portable WHERE ID_CV = :id_cv');
            $req->execute(array('portable' => $this->num_Tel_Portable, 'id_cv' => $this->id_CV));
        }
        if (isset($this->num_Tel_Fixe)) {
            $req = BD::getInstance()->prepare('UPDATE CV SET NUM_TEL_FIXE = :fixe WHERE ID_CV = :id_cv');
            $req->execute(array('fixe' => $this->num_Tel_Fixe, 'id_cv' => $this->id_CV));
        }
        if (isset($this->adresse)) {
            $req = BD::getInstance()->prepare('UPDATE CV SET ADRESSE = :adresse WHERE ID_CV = :id_cv');
            $req->execute(array('adresse' => $this->adresse, 'id_cv' => $this->id_CV));
        }
        if (isset($this->code_Postal)) {
            $req = BD::getInstance()->prepare('UPDATE CV SET CODE_POSTAL = :code_postal WHERE ID_CV = :id_cv');
            $req->execute(array('code_postal' => $this->code_Postal, 'id_cv' => $this->id_CV));
        }
        if (isset($this->ville)) {
            $req = BD::getInstance()->prepare('UPDATE CV SET VILLE = :ville WHERE ID_CV = :id_cv');
            $req->execute(array('ville' => $this->ville, 'id_cv' => $this->id_CV));
        }
        if (isset($this->nom)) {
            $req = BD::getInstance()->prepare('UPDATE CV SET NOM = :nom WHERE ID_CV = :id_cv');
            $req->execute(array('nom' => $this->nom, 'id_cv' => $this->id_CV));
        }
        if (isset($this->prenom)) {
            $req = BD::getInstance()->prepare('UPDATE CV SET PRENOM = :prenom WHERE ID_CV = :id_cv');
            $req->execute(array('prenom' => $this->prenom, 'id_cv' => $this->id_CV));
        }
    }

    /** Fonction qui va permettre la suppression d'un tuple dans la relation CV avec son identifiant grâce à la requête DELETE.

     */
    public function supprimer()
    {
        $req = BD::getInstance()->prepare('DELETE FROM CV WHERE ID_CV = :id_cv');
        $req->execute(array('id_cv' => $this->id_CV));
    }

    /** Fonction qui va permettre d'afficher le CV d'une personne concernée avec ces CV PDF
     * en fonction de son identifiant grâce aux données par la requête SELECT
     * @return CV
     */
    public function afficher()
    {
        $req = BD::getInstance()->prepare('SELECT * FROM CV WHERE ID_CV = :id_cv ');
        $req->execute(array('id_cv' => $this->get_id_cv()));
        $donnees = $req->fetch();
        $cv_Cree = new CV($this->get_id_cv(), $donnees['NUMERO_SECU_SOCIALE'], $donnees['NUM_TEL_PORTABLE'],
            $donnees['NUM_TEL_FIXE'], $donnees['ADRESSE'], $donnees['CODE_POSTAL'], $donnees['VILLE'], $donnees['NOM'], $donnees['PRENOM']);
        $cv_Cree->ajouter_cv_pdf();
        $cv_Cree->ajouter_pieces_jointes();
        return $cv_Cree;
    }


    /** Retourne le nombre de pages nécessaire pour pouvoir afficher tous les CV.
     * @return int
     */
    public static function get_nombres_pages_necessaires()
    {
        $nombre_CV_Total = BD::getInstance()->query('SELECT COUNT(*) AS total_cv FROM CV');
        $donnes_total = $nombre_CV_Total->fetch();
        $total = $donnes_total['total_cv'];

        $nombre_Pages_Necessaires = ceil($total / CV::cv_Par_Page);

        return $nombre_Pages_Necessaires;
    }

    /** Retourne la page actuelle où sont affichés les 10 CV correspondants
     * @return int
     */
    public static function get_page_actuelle()
    {
        $nombre_Pages_Necessaires = CV::get_nombres_pages_necessaires();
        if (isset($_GET['page'])) {
            $page_Actuelle = intval($_GET['page']);

            if ($page_Actuelle > $nombre_Pages_Necessaires)
            {
                $page_Actuelle = $nombre_Pages_Necessaires;
            }

        }
        else
        {
            $page_Actuelle = 1;
        }
        return $page_Actuelle;
    }

    /** Retourne le nombre de CV moyens à afficher par page grâce à la création d'un système de pagination
     * @return array | CV
     */
    public static function afficher_tous_les_CV()
    {
        $page_Actuelle = CV::get_page_actuelle();
        $premiers_CV_A_Afficher = ($page_Actuelle - 1) * CV::cv_Par_Page;

        $req = BD::getInstance()->query('SELECT * FROM CV ORDER BY  ID_CV DESC LIMIT' . $premiers_CV_A_Afficher . ', ' .
            CV::get_nombres_pages_necessaires(). ' ');
        //$req->execute(array('premiers_CV' => $premiers_CV_A_Afficher, 'cv_Par_Page' => CV::cv_Par_Page));
        $liste_CV_Existants = array();
        while ($donnees = $req->fetch())
        {
            $liste_CV_Existants[] = new CV($donnees['ID_CV'], $donnees['NUMERO_SECU_SOCIALE'], $donnees['NUM_TEL_PORTABLE'],
                $donnees['NUM_TEL_FIXE'], $donnees['ADRESSE'], $donnees['CODE_POSTAL'],
                $donnees['VILLE'], $donnees['NOM'], $donnees['PRENOM']);
        }
        return $liste_CV_Existants;
    }

}

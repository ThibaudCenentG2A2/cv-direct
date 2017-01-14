<?php

/**
 * Class CV correspondant à un CV créé par un recruteur
 * @author Thibaud CENENT
 * @version 1.7
 */

class CV
{
    /**
     * Correspond à l'identifiant d'un CV auto incrémentable
     * @var $id_cv
     * @see CV::get_id_cv()
     */
    private $id_cv;

    /**
     * Correspond au numéro de sécurité sociale de la personne concernée dans le CV
     * @var $numero_secu_sociale
     * @see CV::get_numero_secu_sociale()
     */
    private $numero_secu_sociale;

    /**
     * Correspond au numéro de tel portable de la personne concernée dans le CV
     * @var $num_tel_portable
     * @see CV::get_num_tel_portable()
     */
    private $num_tel_portable;

    /**
     * Correspond au numéro de tel fixe de la personne concernée dans le CV
     * @var $num_tel_fixe
     * @see CV::get_num_tel_fixe()
     */
    private $num_tel_fixe;

    /**
     * Correspond à l'adresse de la personne concernée par le CV
     * @var $adresse
     * @see CV::get_adresse()
     */
    private $adresse;

    /**
     * Correspond au code postal de la personne concernée par le CV
     * @var $code_postal
     * @see CV::get_code_postal()
     */
    private $code_postal;

    /**
     * Correspond à la ville où habite la personne concernée par le CV
     * @var $ville
     * @see CV::get_ville()
     */
    private $ville;

    /**
     * Correspond au nom de la personne concernée par le CV
     * @var $nom
     * @see CV::get_nom()
     */
    private $nom;

    /**
     * Correspond au prénom de la personne concernée par le CV
     * @var $prenom
     * @see CV::get_prenom()
     */
    private $prenom;

    /**
     * Correspond à la liste de CV PDF associé à la personne concernée sur le CV
     * @var $liste_cv_pdf
     * @see CV::get_liste_cv_pdf()
     */
    private $liste_cv_pdf = array();

    /** Correspond à une liste de pieces jointe associées à un CV
     * @var array | PieceJointe
     * @see CV::get_liste_pieces_jointe()
     */
    private $liste_pieces_jointe = array();

    /**
     * Correspond au nombre de CV à afficher par page
     * @var int
     * @see CV::get_nombres_pages_necessaires()
     * @see CV::afficher_tous_les_cv()
     */
    const cv_par_page = 10;

    /** Constructeur de la classe CV
     * @param $id_cv
     * @param $numero_secu_sociale
     * @param $num_tel_portable
     * @param $num_tel_fixe
     * @param $adresse
     * @param $code_postal
     * @param $ville
     * @param $nom
     * @param $prenom
     */
    public function __construct($id_cv, $numero_secu_sociale, $num_tel_portable, $num_tel_fixe, $adresse,
                                $code_postal, $ville, $nom, $prenom)
    {
        $this->id_cv = $id_cv;
        $this->numero_secu_sociale = $numero_secu_sociale;
        $this->num_tel_portable = $num_tel_portable;
        $this->num_tel_fixe = $num_tel_fixe;
        $this->adresse = $adresse;
        $this->code_postal = $code_postal;
        $this->ville = $ville;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    /** Retourne l'identifiant d'un CV
     * @return $this->id_cv
     */
    public function get_id_cv()
    {
        return $this->id_cv;
    }

    /** Retourne le numéro de sécurité sociale de l'utilisateur
     * @return $this->numero_secu_sociale
     */
    public function get_numero_secu_sociale()
    {
        return $this->numero_secu_sociale;
    }


    /** Retourne le numéro de téléphone portable de l'utilisateur
     * @return $this->num_tel_portable
     */
    public function get_num_tel_portable()
    {
        return $this->num_tel_portable;
    }

    /** Retourne le numéro de tel fixe de l'utilisateur
     * @return $this->num_tel_fixe
     */
    public function get_num_tel_fixe()
    {
        return $this->num_tel_fixe;
    }

    /** Retourne l'adresse de l'utilisateur
     * @return $this->adresse
     */
    public function get_adresse()
    {
        return $this->adresse;
    }

    /** Retourne le code postal d'un utilisateur
     * @return $this->code_postal
     */
    public function get_code_postal()
    {
        return $this->code_postal;
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
     * @return array| CVPDF
     */
    public function get_liste_cv_pdf()
    {
        return $this->liste_cv_pdf;
    }

    /**
     * @return array| PieceJointe
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
        $req->execute(array('id_cv' => $this->get_id_cv()));
        while ($donnees = $req->fetch()) {
            $this->liste_cv_pdf[] = new CVPDF($donnees['ID_CV_PDF'], $this->get_id_cv());
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
            $this->liste_pieces_jointe[] = new PieceJointe($donnees['ID_PIECE_JOINTE'], $this->get_id_cv(), $donnees['TYPE'],
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
     * @param $num_secu
     * @param $num_portable
     * @param $num_fixe
     * @param $adresse
     * @param $code_postal
     * @param $ville
     * @param $nom
     * @param $prenom
     * @return string
     */
    public static function inserer($num_secu, $num_portable, $num_fixe, $adresse, $code_postal, $ville, $nom, $prenom)
    {
        $req = BD::getInstance()->prepare('INSERT INTO CV(NUMERO_SECU_SOCIALE, NUM_TEL_PORTABLE, NUM_TEL_FIXE, ADRESSE, CODE_POSTAL
        , VILLE, NOM, PRENOM) VALUES(:num_secu, :num_portable, :num_fixe, :adresse, :code_postal, :ville, :nom, :prenom)');
        $req->execute(array('num_secu' => $num_secu, 'num_portable' => $num_portable, 'num_fixe' => $num_fixe, 'adresse' => $adresse,
            'code_postal' => $code_postal, 'ville' => $ville, 'nom' => $nom, 'prenom' => $prenom));
        echo 'Insertion bien réalisé';
        $id_CV_Initialise = BD::getInstance()->lastInsertId();
        return $id_CV_Initialise;
    }

    /** Fonction qui va effectuer une mise à jour sur un cv en particulier grâce à la requête UPDATE
     * @param $id_Cv
     * @param $num_portable
     * @param $num_fixe
     * @param $adresse
     * @param $code_postal
     * @param $ville
     * @param $nom
     * @param $prenom
     */
    public static function mettre_a_jour($id_Cv, $num_portable, $num_fixe, $adresse, $code_postal, $ville, $nom, $prenom )
    {
        if (isset($num_portable))
        {
            $req = BD::getInstance()->prepare('UPDATE CV SET NUM_TEL_PORTABLE = :portable WHERE ID_CV = :id_cv');
            $req->execute(array('portable' => $num_portable, 'id_cv' => $id_Cv));
        }
        if (isset($num_fixe))
        {
            $req = BD::getInstance()->prepare('UPDATE CV SET NUM_TEL_FIXE = :fixe WHERE ID_CV = :id_cv');
            $req->execute(array('fixe' => $num_fixe, 'id_cv' => $id_Cv));
        }
        if (isset($adresse))
        {
            $req = BD::getInstance()->prepare('UPDATE CV SET ADRESSE = :adresse WHERE ID_CV = :id_cv');
            $req->execute(array('adresse' => $adresse, 'id_cv' => $id_Cv));
        }
        if (isset($code_postal))
        {
            $req = BD::getInstance()->prepare('UPDATE CV SET CODE_POSTAL = :code_postal WHERE ID_CV = :id_cv');
            $req->execute(array('code_postal' => $code_postal, 'id_cv' => $id_Cv));
        }
        if (isset($ville))
        {
            $req = BD::getInstance()->prepare('UPDATE CV SET VILLE = :ville WHERE ID_CV = :id_cv');
            $req->execute(array('ville' => $ville, 'id_cv' => $id_Cv));
        }
        if (isset($nom))
        {
            $req = BD::getInstance()->prepare('UPDATE CV SET NOM = :nom WHERE ID_CV = :id_cv');
            $req->execute(array('nom' => $nom, 'id_cv' => $id_Cv));
        }
        if (isset($prenom))
        {
            $req = BD::getInstance()->prepare('UPDATE CV SET PRENOM = :prenom WHERE ID_CV = :id_cv');
            $req->execute(array('prenom' => $prenom, 'id_cv' => $id_Cv));
        }
    }

    /** Fonction qui va permettre la suppression d'un tuple dans la relation CV avec son identifiant grâce à la requête DELETE.
     * @param $id_cv
     */
    public static function supprimer($id_cv)
    {
        $req = BD::getInstance()->prepare('DELETE FROM CV WHERE ID_CV = :id_cv');
        $req->execute(array('id_cv' => $id_cv));
    }

    /** Fonction qui va permettre d'afficher le CV d'une personne concernée avec ces CV PDF
     * en fonction de son identifiant grâce aux données par la requête SELECT
     * @param $id_cv
     * @return \CV
     */
    public static function afficher($id_cv)
    {
        $req = BD::getInstance()->prepare('SELECT * FROM CV WHERE ID_CV = :id_cv ');
        $req->execute(array('id_cv' => $id_cv));
        $donnees = $req->fetch();
        $cv_cree = new CV($id_cv, $donnees['NUMERO_SECU_SOCIALE'], $donnees['NUM_TEL_PORTABLE'],
            $donnees['NUM_TEL_FIXE'], $donnees['ADRESSE'], $donnees['CODE_POSTAL'], $donnees['VILLE'], $donnees['NOM'], $donnees['PRENOM']);
        $cv_cree->ajouter_cv_pdf();
        $cv_cree->ajouter_pieces_jointes();
        return $cv_cree;
    }


    /** Retourne le nombre de pages nécessaire pour pouvoir afficher tous les CV.
     * @return int
     */
    public static function get_nombres_pages_necessaires()
    {
        $nombre_cv_total = BD::getInstance()->query('SELECT COUNT(*) AS total_cv FROM CV');
        $donnes_total = $nombre_cv_total->fetch();
        $total = $donnes_total['total_cv'];

        $nombre_pages_necessaires = ceil($total / CV::cv_par_page);

        return $nombre_pages_necessaires;
    }

    /** Retourne la page actuelle où sont affichés les 10 CV correspondants
     * @return int
     */
    public static function get_page_actuelle()
    {
        $nombre_pages_necessaires = CV::get_nombres_pages_necessaires();
        if (isset($_GET['page'])) {
            $page_actuelle = intval($_GET['page']);
            if ($page_actuelle > $nombre_pages_necessaires)
            {
                $page_actuelle = $nombre_pages_necessaires;
            }
        }
        else
        {
            $page_actuelle = 1;
        }
        return $page_actuelle;
    }

    /** Retourne le nombre de CV moyens à afficher par page grâce à la création d'un système de pagination
     * @return array | CV
     */
    public static function afficher_tous_les_cv()
    {
        $page_actuelle = CV::get_page_actuelle();
        $premiers_cv_a_afficher = ($page_actuelle - 1) * CV::cv_par_page;

        $req = BD::getInstance()->prepare('SELECT * FROM CV ORDER BY ID_CV DESC LIMIT :premiers_cv, :cv_par_page');
        $req->execute(array('premiers_cv' => $premiers_cv_a_afficher, 'cv_par_page' => CV::cv_par_page));
        $liste_cv_existants = array();
        while ($donnees = $req->fetch())
        {
            $liste_cv_existants[] = new CV($donnees['ID_CV'], $donnees['NUMERO_SECU_SOCIALE'], $donnees['NUM_TEL_PORTABLE'],
                $donnees['NUM_TEL_FIXE'], $donnees['ADRESSE'], $donnees['CODE_POSTAL'],
                $donnees['VILLE'], $donnees['NOM'], $donnees['PRENOM']);
        }
        return $liste_cv_existants;
    }

}

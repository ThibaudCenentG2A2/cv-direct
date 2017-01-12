<?php

/**
 * Création de la classe Piece Jointe désignant une pièce jointe qui sera relative aux CV créés
 * @author Thibaud CENENT
 * @version 1.1
 */

class Piece_Jointe
{
    /** Désigne l'identifiant d'une pièce jointe
     * @see Piece_Jointe::get_id_piece_jointe()
     * @var $id_piece_jointe
     */
    private $id_piece_jointe;

    /** Désigne l'identifiant d'un CV associé aux pièces jointes uploads sur le serveur
     * @see Piece_Jointe::get_id_cv()
     * @var $id_cv
     */
    private $id_cv;

    /** Désigne le type de pièce jointe upload à savoir : un CV PDF, une photo du CV ou à un contrat d assurance
     * @see Piece_Jointe::get_type()
     * @var $type
     */
    private $type;

    /** Désigne l'extension d'une pièce jointe
     * @see Piece_Jointe::get_extension()
     * @var $extension
     */
    private $extension;

    /** Désigne une string généré aléatoirement et qui remplacera le nom original de la pièce jointe lors de l'upload sur le serveur ( peut servir d'identifiant unique)
     * @see Piece_Jointe::get_token()
     * @see Piece_Jointe::get_generer_token_aleatoire()
     * @var $token
     */
    private $token;

    /** Constructeur de la classe Piece Jointe
     * @param $id_piece_jointe
     * @param $id_cv
     * @param $type
     * @param $extension
     * @param $token
     */
    public function __construct($id_piece_jointe, $id_cv, $type, $extension, $token)
    {
        $this->id_piece_jointe = $id_piece_jointe;
        $this->id_cv = $id_cv;
        $this->type = $type;
        $this->extension = $extension;
        $this->token = $token;
    }

    /** Retourne l'identifiant d'un pièce jointe
     * @return $this->id_piece_jointe
     */
    public function get_id_piece_jointe()
    {
        return $this->id_piece_jointe;
    }

    /** Retourne le type de la pièce jointe
     * @return $this->type
     */
    public function get_type()
    {
        return $this->type;
    }

    /** Retourne l'extension de la piece jointe
     * @return $this->extension
     */
    public function get_extension()
    {
        return $this->extension;
    }

    /** Retourne l'identifiant d'un CV associé aux pièces jointes
     * @return $this->id_cv
     */
    public function get_id_cv()
    {
        return $this->id_cv;
    }

    /** Retourne le token sous la forme d'un string généré aléatoirement
     * @return $this->token
     */
    public function get_token()
    {
        return $this->token;
    }

    /** Met à jour le type de la pièce jointe
     * @param mixed $type
     */
    public function set_type($type)
    {
        $this->type = $type;
    }

    /** Met à jour l'extension de la pièce jointe
     * @param mixed $extension
     */
    public function set_extension($extension)
    {
        $this->extension = $extension;
    }

    /** Met à jour le token de la pièce jointe
     * @param mixed $token
     */
    public function set_token($token)
    {
        $this->token = $token;
    }

    /** Crée la pièce jointe et l'ajoute à la BD grâce à INSERT
     *
     */
    public function creer()
    {
        $req = BD::getInstance()->prepare('INSERT INTO PIECE_JOINTE (ID_CV, TYPE_PIECE_JOINTE, EXTENSION, TOKEN) VALUES(:id_cv, :type_Piece_Jointe, :extension, :token)');
        $req->execute(array('id_cv' => $this->get_id_cv(), 'type_Piece_Jointe' => $this->get_type(), 'extension' => $this->get_extension(), 'token' => $this->get_token()));
    }

    /** Retourne le token généré aléatoirement
     * @return string
     */
    public function get_generer_token_aleatoire()
    {
        $chaine = "abcdefghijklmnpqrstuvwxy";
        $token_genere = "";
        srand((double)microtime()*1000000);
        for($i=0; $i< 20 ; $i++)
            $token_genere .= $chaine[rand()%strlen($chaine)];
        $req = BD::getInstance()->prepare('SELECT COUNT(*) AS token_existe FROM PIECE_JOINTE WHERE TOKEN = :token');
        $req->execute(array('token' => $token_genere));
        $donnees = $req->fetch();
        if($donnees['token_existe'] == 0)
            $this->token = $token_genere;
        else
            do
            {
                for($i=0; $i< 20 ; $i++)
                    $token_genere .= $chaine[rand()%strlen($chaine)];
                $req->execute(array('token' => $token_genere));
                $donnees = $req->fetch();
                $this->token = $token_genere;

            } while($donnees['token_existe'] != 0);
        return $this->token;
    }

    /** Retourne la pièce jointe associé à l'identifiant nécessaire dans le cas de la suppression d'une pièce jointe
     * @return Piece_Jointe
     */
    public function afficher()
    {
        $req = BD::getInstance()->prepare('SELECT * FROM PIECE_JOINTE WHERE ID_PIECE_JOINTE = :id_piece_jointe AND ID_CV = :id_cv');
        $req->execute(array('id_piece_jointe' => $this->get_id_piece_jointe(), 'id_cv' => $this->get_id_cv()));
        $donnees = $req->fetch();
        return new Piece_Jointe($this->get_id_piece_jointe(), $this->get_id_cv(), $donnees['TYPE_PIECE_JOINTE'], $donnees['EXTENSION'], $donnees['TOKEN']);
    }

    function __toString()
    {
        return $this->get_generer_token_aleatoire();
    }
}
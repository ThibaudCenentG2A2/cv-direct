<?php
/**
 * Created by PhpStorm.
 * User: Thibaud
 * Date: 11/01/2017
 * Time: 09:10
 */

namespace nsCV;


class Piece_Jointe
{
    private $id_Piece_Jointe;

    private $id_cv;

    private $type;

    private $extension;

    private $token;

    public function __construct($id_Piece_Jointe, $id_cv, $type, $extension, $token)
    {
        $this->id_Piece_Jointe = $id_Piece_Jointe;
        $this->id_cv = $id_cv;
        $this->type = $type;
        $this->extension = $extension;
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function get_id_piece_jointe()
    {
        return $this->id_Piece_Jointe;
    }

    /**
     * @return mixed
     */
    public function get_type()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function get_extension()
    {
        return $this->extension;
    }

    /**
     * @return mixed
     */
    public function get_id_cv()
    {
        return $this->id_cv;
    }

    /**
     * @return mixed
     */
    public function get_token()
    {
        return $this->token;
    }

    /**
     * @param mixed $type
     */
    public function set_type($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $extension
     */
    public function set_extension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @param mixed $token
     */
    public function set_token($token)
    {
        $this->token = $token;
    }

    public function creer()
    {
        $req = $GLOBALS['pdo']->prepare('INSERT INTO PIECE_JOINTE (ID_CV, TYPE_PIECE_JOINTE, EXTENSION, TOKEN) VALUES(:id_cv, :type_Piece_Jointe, :extension, :token)');
        $req->execute(array('id_cv' => $this->get_id_cv(), 'type_Piece_Jointe' => $this->get_type(), 'extension' => $this->get_extension(), 'token' => $this->get_token()));
    }

    public function get_generer_token_aleatoire()
    {

        $token_Genere = \OAuthProvider::generateToken(20);
        $req = $GLOBALS['pdo']->prepare('SELECT COUNT(*) AS token_Existe FROM PIECE_JOINTE WHERE TOKEN = :token');
        $req->execute(array('token' => $token_Genere));
        $donnees = $req->fetch();
        if($donnees['token_Existe'] == 0)
            $this->token = $token_Genere;
        else
            do
            {
                $token_Genere = \OAuthProvider::generateToken(20);
                $req->execute(array('token' => $token_Genere));
                $donnees = $req->fetch();
                $this->token = $token_Genere;

            } while($donnees['token_Existe'] != 0);
        return $this->token;
    }

    /**
     * @return array | \nsCV\Piece_Jointe
     */
    public function afficher_pieces_jointes()
    {
        $liste_Pieces_Jointes = array();
        $req = $GLOBALS['pdo']->prepare('SELECT * FROM PIECE_JOINTE WHERE ID_CV = :id_cv');
        $req->execute(array('id_cv' => $this->get_id_cv()));
        while($donnees = $req->fetch())
            $liste_Pieces_Jointes[] = new Piece_Jointe($donnees['ID_PIECE_JOINTE'], $this->get_id_cv(), $donnees['TYPE'],
                $donnees['EXTENSION'], $donnees['TOKEN']);
        return $liste_Pieces_Jointes;
    }

}
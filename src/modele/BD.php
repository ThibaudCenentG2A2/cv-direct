<?php

/**
 * Singleton de base de donnée CV-Direct.
 *
 * @author Tristan Dietz
 *
 * @version 1.0
 */
class BD
{
    /**
     * @var PDO Singleton de connexion à la BD CV-Direct
     */
    static protected $instance;



    /**
     * Constructeur privé pour le singleton.
     */
    private function __construct() {
        self::$instance_co_db = self::co_db();
    }



    /**
     * Fonction pour récupérer la connexion à la BD
     * @return PDO Connexion à la BD
     */
    public static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = self::co_db();
        return self::$instance;
    }



    /**
     * Fonction de connexion à la BD CV-Direct
     * @return PDO Connexion à la BD CV-Direct
     */
    private static function co_db()
    {
        try {
            return new PDO('mysql:host=mysql1.paris1.alwaysdata.com;dbname=cv-direct_bd;charset=utf8',
                'cv-direct',
                'equipettn');
        } catch (Exception $e) {
            die('Erreur de connexion à la base de données de CV-Direct. Veuillez contacter un développeur.');
        }
    }

}

/*
 * Test de la BD
$bd = BD::getInstance()->query('SELECT 3 bisous FROM dual');
while ($d = $bd->fetch())
echo $d['bisous'];
 */
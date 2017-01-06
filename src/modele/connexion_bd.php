<?php
/**
 * Permet la connexion à la base de données présent sur PHP My Admin via le PDO (PHP DATA OBJECT) avec la gestion des exceptions par le biais du try/catch
 *
 * @author Thibaud CENENT
 *
 * @version 1.2
 */
//Connexion à la base de données
$dsn = 'mysql:host=mysql1.paris1.alwaysdata.com;dbname=cv-direct_bd';
try {
    $pdo = new PDO($dsn, 'cv-direct', 'equipettn');
    //Codage de caractères.
    $pdo->exec('SET CHARACTER SET utf8');
    //Gestion des erreurs sous forme d'exceptions.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo 'Echec lors de la connexion : ' . $e->getMessage();
}
?>
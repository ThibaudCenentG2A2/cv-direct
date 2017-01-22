<?php
/**
 * Created by PhpStorm.
 * User: pyrrha
 * Date: 22/01/2017
 * Time: 18:13
 */

unset($_SESSION);
session_destroy();
header('Location: accueil');
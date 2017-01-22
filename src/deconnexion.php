<?php
require_once 'header.php';

unset($_SESSION);
session_destroy();
header('Location: accueil');
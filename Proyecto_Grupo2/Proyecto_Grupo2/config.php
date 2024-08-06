<?php

require 'phpdotenv-master/src/Loader/Loader.php';
//Seguir con esto
use Dotenv\Dotenv;

// Cargar el archivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

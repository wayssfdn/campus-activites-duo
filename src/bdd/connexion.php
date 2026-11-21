<?php

function connecterBase(): PDO
{
    $fichier = __DIR__ . '/../../config/connexion.local.php';
    if (!is_file($fichier)) {
        throw new RuntimeException('Créez config/connexion.local.php à partir du modèle.');
    }

    $config = require $fichier;
    $dsn = 'mysql:host=' . $config['hote'] . ';port=' . $config['port']
        . ';dbname=' . $config['base'] . ';charset=utf8mb4';

    return new PDO($dsn, $config['utilisateur'], $config['mot_de_passe'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}

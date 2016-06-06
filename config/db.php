<?php
    
    //SE CHARGE DE CONNECTER A LA BASE DE DONNÉS
    
    $dsn = 'mysql:dbname=15mmi1pj01_bdd;host=lasrv-whoster.univ-lemans.fr; port=3306'; //BDD (question)
    $user = '15mmi1pj01_bdd';
    $password = 'XDnletbs';
    
    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
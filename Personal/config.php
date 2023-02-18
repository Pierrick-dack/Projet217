<?php 
    session_start(); 
        
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetfac', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo 'good';
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
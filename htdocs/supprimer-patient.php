<?php

require "./config/db_connexion.php";



    $sql="DELETE FROM patients WHERE id = {$_GET['id']}";
    $connexion->query($sql);

    header("Location: liste-patients.php");


?>
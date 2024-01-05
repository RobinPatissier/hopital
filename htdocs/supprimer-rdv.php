<?php

require "./config/db_connexion.php";


    $sql="DELETE FROM appointments WHERE id = {$_GET['id']}";
    $connexion->query($sql);

    header("Location: liste-rdv.php");

?>
<?php require "./config/db_connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier rendez-vous</title>
    <link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>


    <h2 class="text-center p-5 text-decoration-underline"> Modifier un rendez-vous </h2>

    <?php 
require "./config/db_connexion.php";

if(empty($_POST)){
?>
    
<p class="m-3"> Cliquez sur envoyer pour enregistrer les modifications</p>

<form action="./modifier-rdv.php" method="post" class="p-3">
        <div class="mb-3"> Date souhaitée: <input type="datetime-local" name="dateHour" placeholder="date"> </div>    
        <div class="mb-3"> Patient: 
            <select name="idPatients" id="idPatients">
            <?php
                // Récupération des patients depuis la base de données
                $requete = "SELECT id, lastname, firstname FROM patients";
                $resultats = $connexion->query($requete);
                while ($row = $resultats->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div> <button type="submit" class="btn btn-primary m-3"> Enregistrer </button> </div>
    </form>

<?php
}
else {
     // $valeur_id = $_GET['id']; 
    $requete = "UPDATE appointments SET 
                    dateHour = '" . $_POST['dateHour'] . "',
                    idPatients = '" . $_POST['idPatients'] . "' ";
  $connexion->query($requete);
  echo "Rendez-vous modifié avec succès";
}

?>

</body>
</html>
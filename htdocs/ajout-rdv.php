 <?php require "./config/db_connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier patient</title>
    <link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container2">
    <a href="./ajout-rdv.php" class="btn btn-custom rounded-circle p-0 position-absolute start-0 m-3" style="font-size: 24px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" class="bi bi-arrow-left" viewBox="0 0 16 16" fill="currentColor">
            <path fill-rule="evenodd" d="M7.354 12.354a.5.5 0 0 1 0-.708L3.707 8l3.647-3.646a.5.5 0 1 1 .708.708L5.707 7.5H12.5a.5.5 0 0 1 0 1H5.707l2.354 2.354a.5.5 0 0 1-.708.708z"/>
        </svg>
    </a>
</div>

<style>
    .btn-custom {
        background-color: #689090;
        border-color: #008080;
        color: #fff;
    }
</style>

<?php

// Récupérer la liste des patients depuis la base de données pour afficher dans le formulaire
$requetePatients = "SELECT id, firstname, lastname FROM patients";
$stmtPatients = $connexion->query($requetePatients);
$patients = $stmtPatients->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 style="background-color: #537373; color: white;">Ajouter un rendez-vous</h1>

        <?php
        if (empty($_POST)){
            ?>
        
        
        <form action="ajout-rdv.php" method="post">
            <div class="form-group">
                <label for="idPatients">Sélectionnez un patient :</label>
                <select name="idPatients" id="idPatients" class="form-control">
                    <!-- Affichage de la liste des patients -->
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
            <div class="form-group">
                <label for="date">Date et heure du rendez-vous :</label>
                <input type="datetime-local" name="date" id="date" class="form-control">
            </div>
            <button type="submit" class="btn" style="background-color: #537373; color: white;">Ajouter rendez-vous</button>
        </form>
    </div>
    
    <?php }

    else{

        
        
        // Traitement du formulaire et insertion du rendez-vous
        $dateHour = $_POST['date'];
        $idPatients = $_POST['idPatients'];
        
        $request= "INSERT INTO appointments (dateHour, idPatients) VALUES ('$dateHour', $idPatients)";
        $connexion->query($request); 
        echo "Rendez vous ajouter avec succès";
        
    }
    ?>
</body>
</html> 
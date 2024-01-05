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
    <a href="./liste-patients.php" class="btn btn-custom rounded-circle p-0 position-absolute start-0 m-3" style="font-size: 24px;">
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
require "./config/db_connexion.php";

if (empty($_POST)) {
    // Récupérer les informations du patient à partir de la base de données
    $valeur_id = $_GET['id'];
    $requete = "SELECT * FROM patients WHERE id = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute([$valeur_id]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

  <!-- Formulaire pour modifier les informations du patient -->
  <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Modifier le patient</h2>
                <form action="./modifier-patient.php?id=<?= $_GET['id'] ?>" method="post">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $patient['firstname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $patient['lastname'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Date de naissance</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?= $patient['birthdate'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="<?= $patient['phone'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Email</label>
                        <input type="email" id="mail" name="mail" class="form-control" value="<?= $patient['mail'] ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn" style="background-color: #008080; color: white;">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php

} else {
    // Récupérer l'identifiant du patient
    $valeur_id = $_GET['id']; 
    $updateFields = [];
    $params = [];

    // Vérifier chaque champ pour voir s'il a été modifié et le stocker s'il a été modifié
    if(!empty($_POST['firstname'])) {
        $updateFields[] = "firstname = ?";
        $params[] = $_POST['firstname'];
    }

    if(!empty($_POST['lastname'])) {
        $updateFields[] = "lastname = ?";
        $params[] = $_POST['lastname'];
    }

    if(!empty($_POST['birthdate'])) {
        $updateFields[] = "birthdate = ?";
        $params[] = $_POST['birthdate'];
    }

    if(!empty($_POST['phone'])) {
        $updateFields[] = "phone = ?";
        $params[] = $_POST['phone'];
    }

    if(!empty($_POST['mail'])) {
        $updateFields[] = "mail = ?";
        $params[] = $_POST['mail'];
    }

    // Construire la chaîne des champs à mettre à jour
    $updateFieldsStr = implode(", ", $updateFields);

    // Ajouter l'identifiant du patient aux paramètres pour la requête
    $params[] = $valeur_id;

    // Préparer la requête SQL pour mettre à jour les champs spécifiés du patient
    $requete = "UPDATE patients SET $updateFieldsStr WHERE id = ?";
    
    // Préparer et exécuter la requête en utilisant les paramètres
    $stmt = $connexion->prepare($requete);
    $stmt->execute($params);

    // Afficher un message de succès après la mise à jour
    echo "Patient modifié avec succès";
}
?>
   

</body>
</html>


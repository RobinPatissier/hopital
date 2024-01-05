<?php require "./config/db_connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout patient</title>
    <link href="./style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .custom-bg-color {
            background-color: #689090;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container2">
    <a href="./ajout-patient.php" class="btn btn-custom rounded-circle p-0 position-absolute start-0 m-3" style="font-size: 24px;">
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

    <div class="container mt-5">
        <h2 class="text-center pb-4">Ajout d'un nouveau patient</h2>

        <?php if (empty($_POST)) { ?>
            <p class="lead mb-4">Pour créer un patient, veuillez compléter le formulaire suivant:</p>
            <form action="./ajout-patient.php" method="post" class="p-4 bg-light rounded shadow-lg">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom" required>
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Date de naissance:</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Téléphone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Téléphone" required>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Email" required>
                </div>
                <button  type="submit" class="btn" style="background-color: #537373; color: white;">Envoyer</button>
            </form>
        <?php } else {
            $requete = "INSERT INTO patients  (firstname, lastname, birthdate, phone, mail)
            VALUES ('" . $_POST['firstname'] . "','" . $_POST['lastname'] . "', '" . $_POST['birthdate'] . "'," . $_POST['phone'] . ",'" . $_POST['mail'] . "')";
            $connexion->query($requete);
            echo "<div class='alert alert-success mt-4'>Patient ajouté avec succès</div>";
        } ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




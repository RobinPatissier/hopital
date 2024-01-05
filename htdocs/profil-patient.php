<?php require "./config/db_connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil patient</title>
    <link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container2">
        <a href="./liste-patients.php" class="btn btn-custom rounded-circle p-0 position-absolute start-0 m-3" style="font-size: 24px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" class="bi bi-arrow-left" viewBox="0 0 16 16" fill="currentColor">
                <path fill-rule="evenodd" d="M7.354 12.354a.5.5 0 0 1 0-.708L3.707 8l3.647-3.646a.5.5 0 1 1 .708.708L5.707 7.5H12.5a.5.5 0 0 1 0 1H5.707l2.354 2.354a.5.5 0 0 1-.708.708z" />
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

    <div class="container">
        <h2 class="text-center p-2 text-decoration-underline">Profil du patient</h2>
        <?php
        $requete = "SELECT * FROM patients WHERE id= " . $_GET["id"] . " "; 
        $resultat = $connexion->query($requete);

        while ($data = $resultat->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <style>
                .custom-card {
                    max-width: 300px;
                    /* Définissez une largeur maximale pour la carte */
                    margin: 0 auto;
                    /* Centre la carte horizontalement */
                }

                .custom-card img {
                    max-width: 100%;
                    /* Assurez-vous que l'image ne dépasse pas la largeur de sa div parente */
                    height: auto;
                    /* Ajustez automatiquement la hauteur pour préserver les proportions */
                }
            </style>

            <div class="container">
                <div class="card mb-2 custom-card">
                    <img src="./pat.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><strong>Nom :</strong> <?= $data['lastname'] ?></p>
                        <p class="card-text"><strong>Prénom :</strong> <?= $data['firstname'] ?></p>
                        <p class="card-text"><strong>Date de naissance :</strong> <?= $data['birthdate'] ?></p>
                        <p class="card-text"><strong>Téléphone :</strong> <?= $data['phone'] ?></p>
                        <p class="card-text"><strong>Email :</strong> <?= $data['mail'] ?></p>
                        <p class="card-text"><strong>ID :</strong> <?= $data['id'] ?></p>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a href="./modifier-patient.php?id=<?= $_GET['id'] ?>" class="btn btn-primary">Modifier</a>
                            <a href="./detail-rdv.php?id=<?= $data['id']; ?>" class="btn btn-warning">Rendez-vous</a>
                            <a href="./supprimer-patient.php?id=<?= $data['id']; ?>" class="btn btn-danger" ; class="p-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')"> Supprimer </a>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>

            <br>

            <?php
            $requete = "SELECT patients.*, appointments.dateHour FROM appointments INNER JOIN patients ON appointments.idPatients = patients.id WHERE patients.id = " . $_GET["id"];
            $resultat = $connexion->query($requete);

            while ($data = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
               
            <?php
            }
            ?>
            </div>

            <!-- Intégration des scripts Bootstrap (jQuery et Popper.js) -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
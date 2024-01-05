<?php require "./config/db_connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste rendez-vous</title>
    <link href="./style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .list-group-item-action:hover {
            background-color: #689090; /* Couleur au survol */
        }
        .list-group-item-action {
            transition: background-color 0.5s; /* Ajout de la transition */
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2 class="text-center p-5 text-decoration-underline">Liste des rendez-vous</h2>
        <p class="m-3 pb-3">Pour consulter et/ou modifier un rendez-vous de la liste, cliquez sur ce dernier</p>

        <div class="list-group">
            <?php
            $requete = "SELECT * FROM appointments INNER JOIN patients ON appointments.idPatients = patients.id;";
            $resultat = $connexion->query($requete);
            // Boucle while pour parcourir chaque ligne de résultat de la requête SQL
            while ($data = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                <a href="./detail-rdv.php?id=<?= $data['id']; ?>" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Nom : <?= $data['lastname'] ?></h5>
                    <p class="mb-1">Prénom : <?= $data['firstname'] ?></p>
                    <small>Date et Heure : <?= $data['dateHour'] ?></small>
                </a>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Intégration des scripts Bootstrap (jQuery et Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>


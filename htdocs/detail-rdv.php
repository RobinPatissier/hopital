<?php require "./config/db_connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du rendez-vous</title>
    <link href="/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 15px rgba(104, 144, 144, 0.9);
        }

        .btn-action {
            margin-top: 10px;
        }
    </style>

</head>

<body>
    <?php include 'navbar.php'; ?>

    <!-- Bouton retour -->
    <div class="container2">
        <a href="./liste-rdv.php" class="btn btn-custom rounded-circle p-0 position-absolute start-0 m-3" style="font-size: 24px;">
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
        <h2 class="text-center p-5 text-decoration-underline">Détail du rendez-vous</h2>
    </div>
    <div class="d-flex justify-content-center">
        
        <?php
    $requete = "SELECT appointments.id as appointmentId, appointments.dateHour, appointments.idPatients, patients.id, patients.firstname, patients.lastname FROM appointments INNER JOIN patients ON appointments.idPatients = patients.id WHERE idPatients = " . $_GET['id'];
    $resultat = $connexion->query($requete);
    
    
    // Boucle while pour afficher chaque rendez-vous
    while ($data = $resultat->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="card bg-light" style="width:18 rem;">
            <div class="card-body text-center">
                    <!-- Affichage des détails du rendez-vous -->
                    <p class="card-text"><strong>Nom :</strong> <?= $data['lastname'] ?></p>
                    <p class="card-text"><strong>Prénom :</strong> <?= $data['firstname'] ?></p>
                    <p class="card-text"><strong>Date et Heure :</strong> <?= $data['dateHour'] ?></p>
                    <p class="card-text"><strong>ID :</strong> <?= $data['id'] ?></p>
                    <a href="./modifier-rdv.php?id=<?= $data['appointmentId'] ?>" class="btn btn-primary btn-action">Modifier</a>
                    <a href="./supprimer-rdv.php?id=<?= $data['appointmentId'] ?>" class="btn btn-danger btn-action" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')">Supprimer</a>
                </div>
            </div>
            <?php
    }
    ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
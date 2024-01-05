<?php require "./config/db_connexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste patients</title>
    <link href="./style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
     <?php include 'navbar.php'; ?>

     
     
     <h2 class="text-center p-5 text-decoration-underline">Liste de patients</h2>
     <p style="text-align:center" class="m-3 pb-3">Pour consulter les informations des patients de la liste, cliquez sur leur nom:</p>
     
    
    <div class="container mt-4">
    <div class="input-group mb-3">
        <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Rechercher un patient par nom">
        <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
    </div>
</div>


<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $requete = "SELECT * FROM patients";
            $resultat = $connexion->query($requete);
            // Boucle while pour parcourir chaque ligne de résultat de la requête SQL
            while ($data = $resultat->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td> <?= $data['lastname']; ?></td>
                    <td> <?= $data['firstname']; ?></td>
                    <td> <?= $data['mail']; ?></td>
                    <td> <?= $data['phone']; ?></td>
                    <td><a href="./profil-patient.php?id=<?= $data['id']; ?>" style=color:#32CD32;"> Voir </a>
                    <a href="./modifier-patient.php?id=<?= $data['id']; ?>" style="color:#4682B4;" class="p-1"> Modifier </a>
                    <a href="./supprimer-patient.php?id=<?= $data['id']; ?>" style="color:#FF0000;" class="p-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')"> Supprimer </a>

            </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <p class="p-1" style="color : white">Vous pouvez également ajouter un nouveau patient en suivant ce lien :</p>
    <a href="./ajout-patient.php" class="btn" style="background-color: #537373; color: white;">Ajouter un nouveau patient</a>
  </div>

  <!-- Intégration des scripts Bootstrap (jQuery et Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>


</body>
</html>





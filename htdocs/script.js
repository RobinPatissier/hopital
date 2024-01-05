
// Ajouter des événements de clic pour chaque bouton
document.getElementById('bouton1').addEventListener('click', function() {
    // Redirection vers une URL spécifique (modifier l'URL selon votre besoin)
    window.location.href = '/ajout-patient.php';
    // Ajouter des animations supplémentaires ici si nécessaire
  });
  
  document.getElementById('bouton2').addEventListener('click', function() {
    window.location.href = '/liste-patients.php';
  });
  
  document.getElementById('bouton3').addEventListener('click', function() {
    window.location.href = '/ajout-rdv.php';
  });
  
  document.getElementById('bouton4').addEventListener('click', function() {
    window.location.href = '/liste-rdv.php';
  });
  
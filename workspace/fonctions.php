<?php
function resetCookies(){
   setcookie('nom', '', time() + 24*3600, null, null, false, true);
   setcookie('prenom', '', time() + 24*3600, null, null, false, true);
   setcookie('dateNaissance', '', time() + 24*3600, null, null, false, true);
   setcookie('sexe', 'F', time() + 24*3600, null, null, false, true);
   setcookie('commune', $_POST['commune'], time() + 24*3600, null, null, false, true);
   setcookie('gsm','0', time() + 24*3600, null, null, false, true);
   setcookie('mail', '', time() + 24*3600, null, null, false, true);
   setcookie('accord', 'oui', time() + 24*3600, null, null, false, true);
   setcookie('deja_client', 'oui', time() + 24*3600, null, null, false, true);
}
?>
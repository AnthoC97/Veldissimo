<?php
setcookie('nom', $_POST['nom'], time() + 24*3600, null, null, false, true);
setcookie('prenom', $_POST['prenom'], time() + 24*3600, null, null, false, true);
setcookie('civilite', $_POST['civilite'], time() + 24*3600, null, null, false, true);
setcookie('raison_sociale', $_POST['raison_sociale'], time() + 24*3600, null, null, false, true);
setcookie('commune', $_POST['commune'], time() + 24*3600, null, null, false, true);
setcookie('gsm', $_POST['gsm'], time() + 24*3600, null, null, false, true);
setcookie('mail', $_POST['mail'], time() + 24*3600, null, null, false, true);
setcookie('code_postal', $_POST['code_postal'], time() + 24*3600, null, null, false, true);
?>
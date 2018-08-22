<?php 
include("cookies.php");
include("connexion.php");
include("fonctions.php");

$nom = strtoupper($_POST['nom']);
$prenom = strtoupper($_POST['prenom']);
$telephone = str_replace(' ','',$_POST['gsm']);
$raison_sociale = strtoupper($_POST['raison_sociale']);

if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && strlen($telephone) == 10 && preg_match("#^(06|07)[0-9]{8}#",$telephone) === 1 && preg_match("#^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{2,60})$#",$nom) === 1 && preg_match("#^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{2,60})$#",$prenom) === 1 && preg_match("#^([a-zA-Z0-9'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{2,60})$#",$raison_sociale) === 1 ) {
    $test = true;
    $query=$bdd->prepare('SELECT * FROM CLIENT');
    $query->execute();
    while($data = $query->fetch()){
        if( strcmp($telephone,$data[8]) != 0 && strcmp($_POST['mail'],$data[9]) != 0 && strcmp($_POST['raison_sociale2'],$data[5]) != 0 ){
            continue;
        }
        elseif(strcmp($telephone,$data[8]) == 0){
            setcookie('gsm', '', time() + 24*3600, null, null, false, true);
            echo
            '<p>Le numéro de téléphone que vous avez renseigné est déjà existant</p><br>
            <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
            $test = false;
            break;
        }
        elseif(strcmp($_POST['mail'],$data[9]) == 0){
            setcookie('mail', '', time() + 24*3600, null, null, false, true);
            echo
            '<p>L\'adresse email que vous avez renseignée est déjà existante.</p><br>
            <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
            $test = false;
            break;
        }
        elseif(strcmp($_POST['raison_sociale'],$data[5]) == 0){
            setcookie('mail', '', time() + 24*3600, null, null, false, true);
            echo
            '<p>L\'adresse email que vous avez renseignée est déjà existante.</p><br>
            <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
            $test = false;
            break;
        }
    }
    if($test){
        $req = $bdd->prepare('INSERT INTO CLIENT (date,nom,prenom,civilite,raison_sociale,code_postal,commune,gsm,mail) VALUES(?,?,?,?,?,?,?,?,?)');
        $req->execute(array(date('Y-m-d',time()),$_POST['nom'],$_POST['prenom'],$_POST['civilite'],$_POST['raison_sociale'],$_POST['code_postal'],$_POST['commune'],$telephone,$_POST['mail']));
        include("mailer.php");
        resetCookies();
        //header('Location: index.html');
    }
}
elseif(!(preg_match("#^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{2,60})$#",$nom) === 1)){
    setcookie('nom', '', time() + 24*3600, null, null, false, true);
    echo 
    '<p>Le nom doit être composé uniquement de lettres.</p><br>
    <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
}
elseif(!(preg_match("#^([a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{2,60})$#",$prenom) === 1)){
    setcookie('prenom', '', time() + 24*3600, null, null, false, true);
    echo 
    '<p>Le prénom doit être composé uniquement de lettres.</p><br>
    <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
}
elseif(!(preg_match("#^([a-zA-Z0-9'àâéèêôùûçÀÂÉÈÔÙÛÇ[:blank:]-]{2,60})$#",$raison_sociale) === 1)){
    setcookie('prenom', '', time() + 24*3600, null, null, false, true);
    echo 
    '<p>La raison sociale ne doit pas comporter de caractères spéciaux.</p><br>
    <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
}
elseif(!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))){
    setcookie('mail', '', time() + 24*3600, null, null, false, true);
    echo 
    '<p>L\'adresse email n\'est pas au bon format.</p><br>
    <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
}
elseif(!(strlen($telephone) == 10)){
    setcookie('gsm', '', time() + 24*3600, null, null, false, true);
    echo 
    '<p>Le numéro de téléphone doit avoir 10 caractère.</p><br>
    <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
}
elseif(!(preg_match("#^(06|07)[0-9]{8}#",$telephone) === 1)){
    setcookie('gsm', '', time() + 24*3600, null, null, false, true);
    echo 
    '<p>Votre numéro de téléphone n\'es pas au bon format.</p><br>
    <p>Veuillez recommencer à remplir le formulaire <a href="./index.html">ici</a></p>';
}
?>
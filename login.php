<?php
include 'bd_access.php';

$username = $_POST['username'];
$password = $_POST['password'];

// On verfie si les entrees POST correspondent a celles de la BDD
$verifinfo = $bdd->prepare('SELECT username, password, admin FROM utilisateur WHERE username = :username AND password = :password');
$verifinfo->execute (array(
    'username' => $username,
    'password' => $password
));

// Si un resultat est retourne sinon retour a la page login
if ($row = $verifinfo->fetch()) {
    session_start();
    $_SESSION['username'] = $row['username']; // sauvegarde du nom de l'utilisaeur dans une session
    header('Location: rental.php');
    exit;
}
else {
    header('Location: login.html');
    exit;
}
?>
<?php
session_start();
include 'bd_access.php';
// On recupere les valeurs du formulaire POST de rental.php
$duree  = $_POST['duree'];
$id_velo  = $_POST['id_velo'];
// Définit le fuseau horaire par défaut à utiliser.
date_default_timezone_set('Europe/Paris');

// On utilise la fonction date pour recuperer la date au format voulu pour la BDD
$duree_debut = date('Y-m-d H:i:s');

// On utilise la fonction date+mktime pour recuperer la date futur au format voulu pour la BDD
$duree_fin = date('Y-m-d H:i:s', mktime(date("H")+$duree, date("i"), date("s"), date("m"), date("d"), date("Y")));

$verifdispo = $bdd->prepare('SELECT ID_velo FROM location WHERE Fin > :date AND ID_velo=:id_velo');
$verifdispo->execute (array(
    'date' => $duree_debut,
    'id_velo' => $id_velo
));
if (!$verifdispo->fetch()) {
    // On effectue la reservation suivant les parametres recuperes en amont
    $reservation = $bdd->prepare('INSERT INTO location (Debut, Fin, ID_velo) VALUES (:duree_debut, :duree_fin, :id_velo)');
    $reservation->execute (array(
        'duree_debut' => $duree_debut,
        'duree_fin' => $duree_fin,
        'id_velo' => $id_velo
    ));
    header('Location: current_rental.php?reserv=true');
}
else {
    header('Location: rental.php?error=true');
}
?>

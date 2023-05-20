<?php
session_start();
include 'bd_access.php';
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include "menu.php";
    // Définit le fuseau horaire par défaut à utiliser.
    date_default_timezone_set('Europe/Paris');
    // On demande la date/heure
    $date = date('Y-m-d H:i:s');
    ?>
    <br />
    <?php
    if ( isset($_GET['reserv']) && $_GET['reserv'] == true) {
        echo "<div class=\"success\">Réservation effectuée</div>";
        echo "<br />";
    }
    // On demande la liste des velo disponible a la location ou la fin est superieur a la date/heure actuelle
    $velodispo = $bdd->prepare('SELECT Fin, Modele, Image FROM location INNER JOIN velo ON velo.ID_velo=location.ID_velo WHERE Fin > :date');
    $velodispo->execute (array(
        'date' => $date
    ));
    ?>
<div class="velo-list">
                <?php
                // Pour chaque ligne de resultat SQL on l'affiche sous forme d'un tableau
                while ($row = $velodispo->fetch()) {
                ?>
    <div class="velo-item">
        <div class="velo-model"><?php echo $row['Modele']; ?></div>
        <div class="velo-date">Fin location : <?php echo date("d-m-Y à H:i", strtotime($row['Fin'])); ?></div>
        <div class="velo-image"><img src="<?php echo $row['Image']; ?>"></div>
    </div>
                <?php } ?>
    </div>
</body>
</html>

<?php
session_start();
include 'bd_access.php';
include "menu.php";
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Définit le fuseau horaire par défaut à utiliser.
date_default_timezone_set('Europe/Paris');
// On demande la date/heure
$date = date('Y-m-d H:i:s');
echo "Bonjour " . $_SESSION['username'];
echo "<br />";
// On demande la liste des velo disponible a la location ou la fin est superieur a la date/heure actuelle
$velodispo = $bdd->prepare('SELECT Fin, Modele, Image FROM location INNER JOIN velo ON velo.ID_velo=location.ID_velo WHERE Fin > :date');
$velodispo->execute (array(
    'date' => $date
));
?>
<table>
<tr>
<td colspan="2">Velo actuellement en location</td>
</tr>
<tr>
<td>
<?php
// Pour chaque ligne de resultat SQL on l'affiche sous forme d'un tableau
while ($row = $velodispo->fetch()) {
echo "<table>";
echo   "<tbody>";
echo     "<tr>";
echo       "<td style=\"text-align: center; background-color: #e8e8e8;\">&nbsp;<span style=\"color: #1e2a64;\"><strong>" . $row['Modele'] . "</strong></span>";
echo       "</td>";
echo     "</tr>";
echo     "<tr>";
echo       "<td style=\"text-align: center; background-color: #efedee;\">
                <div class=\"circle\">Fin location: " . date("d-m-Y à H:i", strtotime($row['Fin'])) . "</div>";
echo       "</td>";
echo     "</tr>";
echo     "<tr>";
echo       "<td style=\"text-align: center; background-color: #f5f5f5;\"><img src=\"" . $row['Image'] . "\">";
echo       "</td>";
echo     "</tr>";
echo   "</tbody>";
echo "</table>";
echo    "</td><td>";
}
?>
</tr>
</table>
</body>
</html>

<?php
$element_menu = array(
  "Effectuer une location" => "rental.php",
  "Voir les locations en cours" => "current_rental.php"
);

$element_admin_menu = array(
  "Ajouter un velo" => "add.php"
);
?>

<nav>
    <ul style="list-style-type:none;">
        <li>
          Bonjour <?php echo $_SESSION['username']; ?>
        </li>
    </ul>
    
    <ul style="list-style-type:none;">
      <?php foreach($element_menu as $label => $url): ?>
        <li style="display:inline-block;margin-right:10px;">
          <a href="<?php echo $url; ?>"><?php echo $label; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
</nav>

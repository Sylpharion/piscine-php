<?php
session_start();
if (isset($_SESSION['toto']) === FALSE)
    $_SESSION['toto'] = 0;
include('install.php');
?>

<!DOCTYPE html>
<html>
<header>
  <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
  <meta charset="text/html; utf-8">
  <link rel="icon" type="img/ico" href="/img/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
  <title>AdopteUneConnerie</title>
  <div>
    <a href="index.php"><img src="img/logo.jpg" alt="logo" id="imghead"></a>
  </div>
    <br>
  <div text-align="center" position="absolute">
    <ul>
      <?php if (isset($_SESSION['loggued_user']) === FALSE) {echo '<li><a href="login.php">Connexion</a></li> <li><a href="create.php">Inscription</a></li>';}else {echo '<li><a href="delog.php">Deconnexion</a></li>';if ($_SESSION['admin'] === 0) {echo ' <li><a href="delete.php">Supprimer le compte</a></li>';}}?>
      <?php if (isset($_SESSION['loggued_user']) === TRUE && $_SESSION['admin'] === 1) {echo ' <li><a href="comptes_controller.php">Gestion des comptes</a></li> <li><a href="produits_controller.php">Gestion des produits</a></li> <li><a href="categories_controller.php">Gestion des catégories</a></li>';} ?>
    </ul>
  </div>
</header>
  <body>
    <?php if (isset($_SESSION['loggued_user']) === TRUE) echo "<p style=\"text-align:center\">Bonjour ".$_SESSION['loggued_user'].".</p>"; ?>
    <?php
    include('panier.php');
    if (file_exists("private") === FALSE)
    {
      mkdir("private", 0777);
    }
    if (file_exists("private/product") === TRUE)
    {
      $tab = unserialize(file_get_contents("private/product"));
      if (isset($tab) === TRUE && count($tab) > 0)
      {
        echo '<form action="#" method="POST"><table style="margin-left:40%; margin-top:40px; transformX(-50%);">';
        echo '<tr><td></td><td><strong>Nom</strong></td><td><strong>prix</strong></td><td></td><td><strong>Categorie</strong></td></tr>';
        foreach ($tab as $key => $value)
        {
          if (isset($_GET['filter']) === FALSE || (isset($value['cat']) === TRUE && in_array($_GET['filter'], $value['cat']) === TRUE))
          {
            echo '<tr>';
            echo '<td><input type="image" value="'.$value['name'].'" name="submit" style="width:20px; height:auto;" src="http://vignette2.wikia.nocookie.net/monsterhunter/images/6/62/Traptool-icon.png"alt="Submit"></input></td>';
            echo '<td>'.$value['name'].'</td>';
            echo '<td align="right">'.$value['price'].' Z</td>';
            echo '<td><img style="width:50px; height:auto" src="'.$value['img'].'"/></td>';
            if (isset($value['cat']) === TRUE)
            {
              foreach ($value['cat'] as $va)
              {
                echo '<td align="right">'.$va.'</td>';
              }
            }
            echo '</tr>';
          }
        }
        echo '</table></form>';
      }
    }
    if (file_exists("private") === TRUE)
    {
      $tab = array();
      if (file_exists("private/cat") === TRUE)
      {
        $tab = unserialize(file_get_contents("private/cat"));
        echo '<div style="position:fixed; border:1px solid black; -moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px; padding:10px; right:20%; top:300px; margin-right:10%;">';
        echo '<a href="index.php">All</a><br/>';
        foreach ($tab as $va)
        {
          echo '<a href="index.php?filter='.$va.'">'.$va.'</a><br/>';
        }
        echo '</div>';
      }
    }
    ?>
  </body>
</html>

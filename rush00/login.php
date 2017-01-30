<?php session_start(); ?>
<!DOCTYPE html>
<html>
<header>
  <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
  <meta charset="text/html; utf-8"/>
  <link rel="icon" type="img/ico" href="/img/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
  <title>AdopteUneConnerie</title>
  <div>
    <a href="index.php"><img src="img/logo.jpg" alt="logo" id="imghead"/></a>
  </div>
    <br/>
  <div text-align="center" position="absolute">
    <ul>
      <?php if (isset($_SESSION['loggued_user']) === FALSE) {echo '<li><a href="create.php">Inscription</a></li>';}else {echo '<li><a href="delog.php">Deconnexion</a></li>';if ($_SESSION['admin'] === 0) {echo ' <li><a href="delete.php">Supprimer le compte</a></li>';}}?>
      <?php if (isset($_SESSION['loggued_user']) === TRUE && $_SESSION['admin'] === 1) {echo ' <li><a href="comptes_controller.php">Gestion des comptes</a></li> <li><a href="produits_controller.php">Gestion des produits</a></li> <li><a href="categories_controller.php">Gestion des catégories</a></li>';} ?>
    </ul>
  </div>
</header>
  <body>
    <?php include('panier.php'); if (isset($_SESSION['loggued_user']) === TRUE) echo "<p style=\"text-align:center\">Bonjour ".$_SESSION['loggued_user'].".</p>"; ?>
    <div>
    <form action="login_controller.php" method="post">
      <table style="margin:10% auto auto 30%">
        <tr>
          <td text-align="left">Identifiant: </td>
          <td><input required type="text" name="log" oninvalid="setCustomValidity('Veuillez entrer un identifiant valide(pas de caractère spéciaux)')"/></td>
        </tr>
        <tr>
          <td text-align="left">Mot de passe: </td>
          <td><input type="text" required name="pass" /></td>
          <td><input type="submit" name="submit" value="Connexion"/></td>
        </tr>
      </table>
    </form>
  </div>
  </body>
</html>

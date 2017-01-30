<?php
session_start();
echo '<body><img src="img/go.jpg" style="width:100%">';
echo '<a href="reboot.php"><span style="position:relative; border:1px solid black; -moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px; box-shadow:10px 10px 10px black; background-color:#385b16; padding:30px; top:-80%; margin-left:50px; text-decoration:none; font-size:20px text-shadow: 1px 1px black;"><strong>Retour à la maison</strong></span></a><body>';
if (file_exists("private") === TRUE)
{
  $pagne = array();
  if (file_exists("private/panier") === TRUE)
  {
    $pagne = unserialize(file_get_contents("private/panier"));
  }
  $pagne[] = $_SESSION['panier'];
  $prout = serialize($pagne);
  file_put_contents("private/panier", $prout."\n");
  $_SESSION['panier'] = NULL;
}
?>

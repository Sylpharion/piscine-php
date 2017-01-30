<?php
session_start();
if (file_exists("private") === FALSE)
{
  mkdir("private", 0777);
}
if (file_exists("private/product") === TRUE)
{
  $tab = unserialize(file_get_contents("private/product"));
  if (isset($tab) === TRUE && count($tab) > 0)
  {
    include('template_up.html');
    echo '<form><table style="margin-left:40%; margin-top:40px; transformX(-50%);">';
    echo '<tr><td></td><td><strong>Nom</strong></td><td><strong>prix</strong></td><td></td><td><strong>Categorie</strong></td></tr>';
    foreach ($tab as $key => $value)
    {
      echo '<tr>';
      echo '<td><a href="#"><img name="submit" style="width:20px; height:auto;" src="http://vignette2.wikia.nocookie.net/monsterhunter/images/6/62/Traptool-icon.png"/></a></td>';
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
    echo '</table></form>';
    include('template_d.html');
  }
}
?>

<?php
session_start();
function ft_toto()
{
  if (isset($_SESSION['toto']) === TRUE)
  {
   return ($_SESSION['toto']);
  }
  else
  {
    return "0";
  }
}

if (isset($_POST['delete']) === TRUE && isset($_SESSION['panier']) === TRUE)
{
  foreach ($_SESSION['panier'] as $key => $value)
  {
    if ($value['name'] === $_POST['delete'])
    {
      if ($_SESSION['panier'][$key]['count'] === 1)
      {
        unset($_SESSION['panier'][$key]);
      }
      else {
        $_SESSION['panier'][$key]['count']--;
        $_SESSION['panier'][$key]['finalprice'] = $_SESSION['panier'][$key]['price'] * $_SESSION['panier'][$key]['count'];
      }
    }
  }
}

if (isset($_POST['submit']) === TRUE)
{
  if (file_exists("private") === TRUE)
  {
    $tab = array();
    if (file_exists("private/product") === TRUE)
    {
      $tab = unserialize(file_get_contents("private/product"));
    }
    if (count($tab) > 0)
    {
      $done = FALSE;
      if (isset($_SESSION['panier']) === TRUE)
      {
        foreach ($_SESSION['panier'] as $key => $value)
        {
          if ($value['name'] === $_POST['submit'])
          {
            $_SESSION['panier'][$key]['count']++;
            $_SESSION['panier'][$key]['finalprice'] = $_SESSION['panier'][$key]['price'] * $_SESSION['panier'][$key]['count'];
            $done = TRUE;
          }
        }
      }
      if ($done === FALSE)
      {
        foreach ($tab as $key => $value)
        {
          if ($value['name'] === $_POST['submit'])
          {
            $res['name'] = $value['name'];
            $res['price'] = $value['price'];
            $res['count'] = 1;
            $res['finalprice'] = $res['price'];
            $_SESSION['panier'][] = $res;
          }
        }
      }
    }
  }
}

echo '<div id="panier" style="position:fixed; border:1px solid black; -moz-border-radius:10px; -webkit-border-radius:10px; border-radius:10px; padding:10px; margin-left:10%;">
      <h4>Panier</h4>';
      if (isset($_SESSION['panier']) === TRUE)
      {
        echo '<form action="#" method="POST">';
        echo '<table align="left">';
        echo '<tr>';
        echo '<td>Name</td><td>Quantity</td><td>Price</td><td>Final</td><td></td></tr>';
        $_SESSION['toto'] = 0;
        foreach ($_SESSION['panier'] as $key => $value)
        {
          echo '<tr><td>'.$value['name'].'</td><td> x'.$value['count'].'</td><td>'.$value['price'].' </td><td>= '.$value['finalprice'].'</td><td><input type="image" value="'.$value['name'].'" name="delete" style="width:20px; height:auto;" src="http://vignette1.wikia.nocookie.net/mogapedia/images/1/16/Status_Effect-Laceration_MH4U_Icon.png/revision/latest?cb=20160611133828&path-prefix=fr"alt="Delete"></input></td></tr>';
          $_SESSION['toto'] += $value['finalprice'];
        }
        echo '</table><br>';
        echo '</form>';
      }
      echo 'Total : '.$_SESSION['toto'].'<br>';
      if (isset($_SESSION['loggued_user']) === TRUE)
      {echo '<a href="go.php">Partir à la chasse</a>';}
      echo '</div>';
?>

<?php
session_start();
function ft_dodo($var, $name)
{
  foreach ($var as $key => $value)
  {
    if ($value['name'] === $name)
      return FALSE;
  }
  return TRUE;
}

if (isset($_SESSION['admin']) === TRUE && $_SESSION['admin'] === 1)
{
  if (file_exists("private") === TRUE)
  {
    $tab = array();
    if (file_exists("private/product") === TRUE)
    {
      $tab = unserialize(file_get_contents("private/product"));
    }
    if ($_POST['submit'] === 'OK')
    {
      if (isset($_POST['removename']) === TRUE)
      {
          foreach ($tab as $key => $value)
          {
            if ($value['name'] === $_POST['removename'])
            {
              unset($tab[$key]);
            }
          }
          $prout = serialize($tab);
          file_put_contents("private/product", $prout."\n");
      }

      if (isset($_POST['newname']) === TRUE && isset($_POST['newprice']) === TRUE)
      {
        foreach ($tab as $key => $value)
        {
          if ($value['name'] === $_POST['newname'])
          {
            $tab[$key]['price'] = $_POST['newprice'];
          }
        }
        $prout = serialize($tab);
        file_put_contents("private/product", $prout."\n");
      }
      if (isset($_POST['name']) === TRUE && isset($_POST['price']) === TRUE && isset($_POST['img']) === TRUE)
      {
        if (ft_dodo($tab, $_POST['name']) === TRUE)
        {
          if (isset($_POST['cat']) === FALSE)
          {
            $tab[] = array('name' => $_POST['name'] , 'price' => $_POST['price'], 'img' => $_POST['img']);
          }
          else
          {
            $tab[] = array('name' => $_POST['name'] , 'price' => $_POST['price'], 'img' => $_POST['img'], 'cat' => $_POST['cat']);
          }
          $prout = serialize($tab);
          file_put_contents("private/product", $prout."\n");
        }
      }
    }
  }
  include('template_up.html');
  echo '<form action="#"  method="POST" style="margin-left:45%; margin-top:20px; transformX(-50%);">';
  echo '<strong>Change price</strong><br/>';
  echo '<input required type="text" name="newname" placeholder="Product name"/><br/>';
  echo '<input required type="text" name="newprice" placeholder="New Product price"/><br>';
  echo '<input type="submit" name="submit" value="OK"></form><br>';

  echo '<form action="#"  method="POST" style="margin-left:45%; margin-top:20px; transformX(-50%);">';
  echo '<table><tr><td><strong>Add Item</strong></td><tr>';
  echo '<tr><td><input required type="text" name="name" placeholder="Product name"/></td></tr>';
  echo '<tr><td><input required type="number" min="1" max="999999" style="width:95%;" name="price" placeholder="Product price"/></td></tr>';
  echo '<tr><td><input required type="url" name="img" placeholder="Product url"/></td></tr>';
  $catab = array();
  if (file_exists("private/cat") === TRUE)
  {
    $catab = unserialize(file_get_contents("private/cat"));
  }
  if (count($catab) > 0)
  {
    echo '<table><tr><td><strong>category name</strong></td><td><strong>add</strong></td></tr>';
    foreach ($catab as $value)
    {
      echo '<tr>';
      echo '<td>'.$value.'</td>';
      echo '<td><input type="checkbox"';
      echo ' id="" name="cat[]" value="'.$value.'"/></td>';
      echo '</tr>';
    }
    echo '</table>';
    echo '<input type="submit" name="submit" value="OK"></form>';
  }

  echo '<form action="#"  method="POST" style="margin-left:45%; margin-top:20px; transformX(-50%);">';
  echo '<strong>Remove Item</strong><br/>';
  echo '<input type="text" name="removename" placeholder="Product name"/><br/>';
  echo '<input type="submit" name="submit" value="OK"></form><br>';

  if (count($tab) > 0)
  {
    echo '<table style="margin-left:40%; margin-top:40px; transformX(-50%);">';
    echo '<tr><td><strong>Nom</strong></td><td><strong>prix</strong></td><td></td><td><strong>Categorie</strong></td>';
    foreach ($tab as $key => $value)
    {
      echo '<tr>';
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
    echo '</table>';
  }
  include('template_d.html');
}
else
{
 include('teapot.php');
}
?>

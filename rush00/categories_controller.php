<?php
session_start();
if (isset($_SESSION['admin']) === TRUE && $_SESSION['admin'] === 1)
{
  if (file_exists("private") === TRUE)
  {
    $tableau = array();
    if (file_exists("private/cat") === TRUE)
    {
      $tableau = unserialize(file_get_contents("private/cat"));
    }
    if ($_POST['submit'] === 'OK')
    {
      if (isset($_POST['new']) === TRUE && strlen($_POST['new']) > 0 && in_array($_POST['new'], $tableau) === FALSE)
      {
        $tableau[] = $_POST['new'];
        $prout = serialize($tableau);
        file_put_contents("private/cat", $prout."\n");
      }
      if (isset($_POST['suppr']) === TRUE)
      {
        foreach ($tableau as $key => $value)
        {
          foreach ($_POST['suppr'] as $val)
          {
            if ($value === $val)
            {
              unset($tableau[$key]);
            }
          }
        }
        $prout = serialize($tableau);
        file_put_contents("private/cat", $prout."\n");
      }
    }
  }
  include('template_up.html');
  echo '<form action="#" method="POST" style="margin-left:50%; margin-top:20px; transformX(-50%);">';
  if ($tableau !== NULL)
  {
    echo '<table><tr>
    <td>Categorie</td>
    <td>Supprimer</td>
    </tr>';
    foreach ($tableau as $key)
    {
      echo '<tr>
      <td>'.$key.'</td>
      <td><input type="checkbox"';
      echo ' id="" name="suppr[]" value="'.$key.'"/></td>
      </tr>';
    }
    echo '</table><br>';
  }
  echo '<input type="text" name="new" placeholder="New category"/>';
  echo '<input type="submit" name="submit" value="OK"/>';
  echo '</form>';
  include('template_d.html');
}
else
{
 include('teapot.php');
}
?>

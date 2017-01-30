<?php
session_start();
if (isset($_SESSION['admin']) === TRUE && $_SESSION['admin'] === 1)
{
  if (file_exists("private") === TRUE)
  {
    $tab = array();
    if (file_exists("private/passwd") === TRUE)
    {
      $tab = unserialize(file_get_contents("private/passwd"));
    }
    if ($_POST['submit'] === 'OK')
    {
      foreach ($tab as $key=>$user)
      {
        if (isset($_POST['admin']) === TRUE)
        {
          foreach ($_POST['admin'] as $value)
          {
            if ($value === $user['login'])
            {
              $tab[$key]['admin'] = 1;
            }
            else if ($user['login'] !== $_SESSION['loggued_user'])
            {
              $tab[$key]['admin'] = 0;
            }
          }
        }
      }
      if (isset($_POST['suppr']) === TRUE)
      {
        foreach ($_POST['suppr'] as $value)
        {
          foreach ($tab as $key=>$user)
          {
            if ($value === $user['login'])
            {
              unset($tab[$key]);
            }
          }
        }
      }
      $prout = serialize($tab);
      file_put_contents("private/passwd", $prout."\n");
      include('index.php');
      exit(0);
    }
    if ($tab !== NULL)
    {
      if (count($tab) > 1)
      {
        include('template_up.html');
        echo '<div style="margin-left:50%; transformX(-50%);"><form method="POST" action="#"><table>';
        echo '<tr>
        <td>ID</td>
        <td>Admin</td>
        <td>Supprimer</td>
        </tr>';
      }
      foreach ($tab as $key)
      {
        if ($key['login'] !== $_SESSION['loggued_user'])
        {
          echo '<tr>
          <td>'.$key['login'].'</td>
          <td><input type="checkbox"';
          if ($key['admin'] === 1)
          {
            echo 'checked="checked"';
          }
          echo ' id="" name="admin[]" value="'.$key['login'].'"/></td>
          <td><input type="checkbox" id="" name="suppr[]" value="'.$key['login'].'"/></td>
          </tr>';
        }
      }
      if (count($tab) > 1)
      {
        echo '</table><input type="submit" name="submit" value="OK"/></form></div>';
        include('template_d.html');
      }
      else
      {
        include('index.php');
        exit(0);
      }
    }
  }

}
else
{
 include('teapot.php');
}
?>

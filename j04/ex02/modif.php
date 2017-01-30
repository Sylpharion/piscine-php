<?php
  if ($_POST['submit'] == "OK" && $_POST['newpw'] != NULL)
  {
    $oldpw = hash('whirlpool', $_POST['oldpw']);
    $newpw = hash('whirlpool', $_POST['newpw']);

    if (file_exists("../private/passwd") == TRUE)
      $tab = unserialize(file_get_contents("../private/passwd"));
    if ($tab != NULL)
    {
      $i = 0;
      foreach ($tab as $key)
      {
        if ($key['login'] == $_POST['login'] && $key['passwd'] == $oldpw)
        {
          $tab[$i]['passwd'] = $newpw;
          $modif = 1;
        }
        $i++;
      }
    }
    if ($modif == 1)
    {
      $prout = serialize($tab);
      file_put_contents("../private/passwd", $prout);
      echo "OK\n";
    }
    else
    {
      echo "ERROR\n";
    }
  }
  else
  {
    echo "ERROR\n";
  }
?>

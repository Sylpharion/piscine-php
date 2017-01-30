<?php
  if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && $_POST['submit'] == "OK")
  {
    $pass = hash('whirlpool', $_POST['passwd']);
    if (file_exists("../private") == FALSE)
    {
      mkdir("../private", 0777);
    }
    else
    {
      if (file_exists("../private/passwd") == TRUE)
        $tab = unserialize(file_get_contents("../private/passwd"));
    }
    if ($tab != NULL)
    {
      foreach ($tab as $key)
      {
        if ($key['login'] == $_POST['login'])
          {
            $doublon = 1;
          }
      }
    }
    if ($doublon == 1)
    {
      echo "ERROR\n";
    }
    else
    {
      $tab[] = array('login'=>$_POST['login'], 'passwd'=>$pass);
      $prout = serialize($tab);
      file_put_contents("../private/passwd", $prout."\n");
      echo "OK\n";
    }
  }
  else
  {
    echo "ERROR\n";
  }
?>

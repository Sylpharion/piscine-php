<?php
if ($_POST['log'] != NULL && $_POST['pass'] && $_POST['repass'] != NULL && $_POST['submit'] == "Inscription")
{
  if ($_POST['pass'] != $_POST['repass'])
  {
    echo "<script type='text/javascript'>alert('Les mots de passe sont incorrect');</script>";
    include("create.html");
    exit(1);
  }
  $tab = array();
  $pass = hash('whirlpool', $_POST['pass']);
  if (file_exists("private") === FALSE)
  {
    mkdir("private", 0777);
  }
  if (file_exists("private/passwd") === FALSE)
  {
    $pwd = hash('whirlpool', 'admin');
    $tab[] = array('login'=>"admin", 'passwd'=>$pwd, 'admin'=>1);
    $prout = serialize($tab);
    file_put_contents("private/passwd", $prout."\n");
  }
  else
  {
    $tab = unserialize(file_get_contents("private/passwd"));
  }
  $doublon = 0;
  if ($tab !== NULL)
  {
    foreach ($tab as $key)
    {
      if ($key['login'] === $_POST['log'])
        {
          $doublon = 1;
        }
    }
  }
  if ($doublon === 1)
  {
    echo "<script type='text/javascript'>alert('Cet utilisateur existe déja!');</script>";
    include("create.php");
    exit(1);
  }
  else
  {
    $tab[] = array('login'=>$_POST['log'], 'passwd'=>$pass, 'admin'=>0);
    $prout = serialize($tab);
    file_put_contents("private/passwd", $prout."\n");
    include("create.php");
    echo "<p style=\"text-align:center\">L'utilisateur a été créé avec succes";
    exit(1);
  }
}
else
{
  echo "<script type='text/javascript'>alert('Identifiant ou/et mot de passe incorrect');</script>";
  include("create.php");
  exit(1);
}
?>

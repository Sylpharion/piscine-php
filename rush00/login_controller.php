<?php
session_start();
if ($_POST['log'] != NULL && $_POST['pass'] != NULL && $_POST['submit'] === "Connexion")
{
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
  if ($tab !== NULL)
  {
    $user = 0;
    foreach ($tab as $key)
    {
      if ($key['login'] === $_POST['log'] && $pass === $key['passwd'])
        {
          $_SESSION['loggued_user'] = $_POST['log'];
          $_SESSION['admin'] = $key['admin'];
          $user = 1;
          include("login.php");
        }
    }
    if ($user === 0)
    {
      include("login.php");
      echo "<script type='text/javascript'>alert('Identifiant ou/et mot de passe incorrect');</script>";
    }
  }
  else
  {
    include("login.php");
    echo "<script type='text/javascript'>alert('Identifiant ou/et mot de passe incorrect');</script>";
  }
}
else
{
  include("login.php");
  echo "<script type='text/javascript'>alert('Identifiant ou/et mot de passe incorrect');</script>";
}
?>

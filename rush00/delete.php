<?php
session_start();
if (file_exists("private/passwd") === TRUE)
    $tab = unserialize(file_get_contents("private/passwd"));
if ($tab !== NULL && $_SESSION['admin'] === 0)
{
  $user = 0;
  foreach ($tab as $key => $value)
  {
    if ($_SESSION['loggued_user'] === NULL || $value['login'] !== $_SESSION['loggued_user'])
    {
      $res[$key] = $value;
    }
    else
    {
      $_SESSION['loggued_user'] = NULL;

    }
  }
  $prout = serialize($res);
  file_put_contents("private/passwd", $prout."\n");
}
include('index.php');
?>

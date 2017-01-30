<?php
function auth($login, $passwd)
{
  $pass = hash("whirlpool", $passwd);
  $tab = file_get_contents("../private/passwd");
  $prout = unserialize($tab);
  foreach ($prout as $key)
  {
    if ($key['login'] == $login && $pass == $key['passwd'])
    {
      $modif = TRUE;
    }
  }
	if ($modif == FALSE)
  {
		return (FALSE);
  }
	else
  {
		return (TRUE);
  }
}
?>

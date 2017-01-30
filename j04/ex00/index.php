<?php
  session_start();
  if ($_GET["submit"] == "OK")
	{
	   $_SESSION['login'] = $_GET['login'];
	   $_SESSION['passwd'] = $_GET['passwd'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>session</title>
  </head>
  <body style="background-color:#696969; margin-top:20%" align="center">
    <form action="index.php" method="get">
      <div style="margin: 5px">
        <label style="font-size:30px">Identifiant: </label><input type="text" style="font-size:30px; margin-left:35px" name="login" value="<?php if($_SESSION['login']) echo $_SESSION['login'];?>"><br>
      </div>
      <div style="margin: 5px 5px 5px 68px">
        <label style="font-size:30px">Mot de passe: </label><input type="text" style="font-size:30px" name="passwd" value="<?php if($_SESSION['passwd']) echo $_SESSION['passwd'];?>">
        <input type="submit" name="submit" value="OK" style="font-size:30px; width:60px; height:auto"><br>
      </div>
    </form>
  </body>
</html>

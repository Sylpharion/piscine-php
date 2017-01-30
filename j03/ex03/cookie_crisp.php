<?php
$action = $_GET["action"];
$name = $_GET["name"];
$value = $_GET["value"];

if ($action == "set")
	setcookie($name, $value, time() + (60 * 60 * 24 * 30));
else if ($action == "get")
{
	if ($_COOKIE[$name] != FALSE)
	  echo $_COOKIE[$name]."\n";
}
else if ($action == "del")
	setcookie($name, "DESTRUCTION", 1);
?>

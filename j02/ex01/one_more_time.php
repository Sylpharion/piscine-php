#!/usr/bin/php
<?php

function ft_verif_week($str)
{
	if (preg_match("/^[Ll]undi$/", $str) == 0)
		return ("ok");
	elseif (preg_match("/^[Mm]ardi$/", $str) == 0)
		return ("ok");
	elseif (preg_match("/^[Mm]ercredi$/", $str) == 0)
		return ("ok");
	elseif (preg_match("/^[Jj]eudi$/", $str) == 0)
		return ("ok");
	elseif (preg_match("/^[Vv]endredi$/", $str) == 0)
		return ("ok");
	elseif (preg_match("/^[Ss]amedi$/", $str) == 0)
		return ("ok");
	elseif (preg_match("/^[Dd]imanche$/", $str) == 0)
		return ("ok");
	else
		return ("nope");
}

function ft_verif_day($str)
{
	if (preg_match('/^[0-9]{0}$/', $str) == 0 && strlen($str) < 3 && strlen($str) > 0 && $str <= 31)
		return ("ok");
	else
		return ("nope");
}

function ft_verif_month($str)
{
	if (preg_match('/^[Jj]anvier$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Ff]evrier$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Mm]ars$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Aa]vril$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Mm]ai$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Jj]uin$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Jj]uillet$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Aa]out$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Ss]eptembre$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Oo]ctobre$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Nn]ovembre$/', $str) == 0)
		return ("ok");
	elseif (preg_match('/^[Dd]ecembre$/', $str) == 0)
		return ("ok");
	else
		return ("nope");
}

function ft_verif_year($str)
{
	if (preg_match("/^[0-9]{3}$/", $str) == 0 && strlen($str) == 4)
		return ("ok");
	else
		return ("nope");
}

function ft_verif_hour($str)
{
	if (preg_match("/^[0-9]{0}:[0-9]{0}:[0-9]{0}$/", $str) == 0 && strlen($str) == 8)
		return ("ok");
	else
		return ("nope");
}

 // --------------------------------------------- //

if ($argv[1])
{
	date_default_timezone_set ("Europe/Paris");
	$date = explode(" ", $argv[1]);
	if (count($date) != 5)
	{
		echo "Wrong Format\n";
		exit(1);
	}
	elseif (ft_verif_week($date[0]) != "ok")
	{
		echo "Wrong Format\n";
		exit(1);
	}
	elseif (ft_verif_day($date[1]) != "ok")
	{
		echo "Wrong Format\n";
		exit(1);
	}
	elseif (ft_verif_month($date[2]) != "ok")
	{
		echo "Wrong Format\n";
		exit(1);
	}
	elseif (ft_verif_year($date[3]) != "ok")
	{
		echo "Wrong Format\n";
		exit(1);
	}
	elseif (ft_verif_hour($date[4]) != "ok")
	{
		echo "Wrong Format\n";
		exit(1);
	}
	else
	{
		$week = $date[0];
		$day = $date[1];
		$month = $date[2];
		$year = $date[3];
		$hour = $date[4];

		$month = preg_replace("/[Jj]anvier/", '01', $month);
		$month = preg_replace('/[Ff]evrier/', '02', $month);
		$month = preg_replace('/[Mm]ars/', '02', $month);
		$month = preg_replace('/[Aa]vril/', '03', $month);
		$month = preg_replace('/[Mm]ai/', '05', $month);
		$month = preg_replace('/[Jj]uin/', '06', $month);
		$month = preg_replace('/[Jj]uillet/', '07', $month);
		$month = preg_replace('/[Aa]out/', '08', $month);
		$month = preg_replace('/[Ss]eptembre/', '09', $month);
		$month = preg_replace('/[Oo]ctobre/', '10', $month);
		$month = preg_replace('/[Nn]ovembre/', '11', $month);
		$month = preg_replace('/[Dd]ecembre/', '12', $month);
		$strdate = $day."/";
		$strdate .= $month."/";
		$strdate .= $year." ";
		$strdate .= $hour;
		$tstamp = strtotime($strdate);
		if (strlen($tstamp) > 0)
			echo $tstamp."\n";
		else
		{
			echo "Wrong Format\n";
			exit(1);
		}
	}
 }
?>

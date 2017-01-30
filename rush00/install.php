<?php
if (file_exists("private") === FALSE)
{
  mkdir("private", 0777);
}
if (file_exists("private/passwd") === FALSE)
{
  $tab[0] = array('login'=>"admin", 'passwd'=>hash('whirlpool', 'admin'), 'admin'=>1);
  $tab[1] = array('login'=>"sean", 'passwd'=>hash('whirlpool', 'lol'), 'admin'=>1);
  $tab[2] = array('login'=>"user", 'passwd'=>hash('whirlpool', '1234'), 'admin'=>0);

  $prout = serialize($tab);
  file_put_contents("private/passwd", $prout."\n");
}
else if (file_exists("private/passwd") === TRUE)
{
  $tab = unserialize(file_get_contents("private/passwd"));
  if (count($tab) < 1)
  {
    $newtab[0] = array('login'=>"admin", 'passwd'=>hash('whirlpool', 'admin'), 'admin'=>1);
    $newtab[1] = array('login'=>"sean", 'passwd'=>hash('whirlpool', 'lol'), 'admin'=>1);
    $newtab[2] = array('login'=>"user", 'passwd'=>hash('whirlpool', '1234'), 'admin'=>0);
    $prout = serialize($newtab);
    file_put_contents("private/passwd", $prout."\n");
  }
}

if (file_exists("private/cat") === FALSE)
{
  $tab = array("Armes", "Objets", 'Ressources');
  $prout = serialize($tab);
  file_put_contents("private/cat", $prout."\n");
}

if (file_exists("private/product") === FALSE)
{
  $tab[0] = array('name' => "Sword & Shield" , 'price' => "1000", 'img' => "http://vignette1.wikia.nocookie.net/monsterhunter/images/4/45/ItemIcon034.png", 'cat'=>array("Armes"));
  $tab[1] = array('name' => "Great Sword" , 'price' => "5000", 'img' => "http://vignette1.wikia.nocookie.net/monsterhunter/images/2/28/GS_Icon_Purple.png", 'cat'=>array("Armes"));
  $tab[2] = array('name' => "Epic Hammer" , 'price' => "20000", 'img' => "http://vignette3.wikia.nocookie.net/monsterhunter/images/6/6c/ItemIcon057c.png", 'cat'=>array("Armes"));
  $tab[3] = array('name' => "Throwing Knife" , 'price' => "100", 'img' => "http://vignette2.wikia.nocookie.net/monsterhunter/images/7/75/ItemIcon056.png", 'cat'=>array("Armes", "Objets"));
  $tab[4] = array('name' => "Potion" , 'price' => "50", 'img' => "http://media.kotaku.foxtrot.future.net.uk/wp-content/uploads/sites/52/2015/02/ItemIcon043c.png", 'cat'=>array("Objets"));
  $tab[5] = array('name' => "Rustshard" , 'price' => "400", 'img' => "http://vignette1.wikia.nocookie.net/monsterhunter/images/a/af/ItemIcon047.png", 'cat'=>array("Objets"));
  $tab[6] = array('name' => "Whetstone" , 'price' => "70", 'img' => "http://media.kotaku.foxtrot.future.net.uk/wp-content/uploads/sites/52/2015/02/ItemIcon024a-150x150.png", 'cat'=>array("Objets"));
  $tab[7] = array('name' => "Meat" , 'price' => "100", 'img' => "http://vignette2.wikia.nocookie.net/monsterhunter/images/7/74/ItemIcon020e.png", 'cat'=>array("Ressources"));
  $tab[8] = array('name' => "Dragon Claw" , 'price' => "2500", 'img' => "http://vignette3.wikia.nocookie.net/monsterhunter/images/a/ae/Status_Effect-Dragonblight_MH4_Icon.png", 'cat'=>array("Ressources"));
  $tab[9] = array('name' => "Armor Sphere" , 'price' => "5000", 'img' => "http://vignette4.wikia.nocookie.net/monsterhunter/images/e/e9/ItemIcon019.png", 'cat'=>array("Ressources"));
  $prout = serialize($tab);
  file_put_contents("private/product", $prout."\n");
}

?>

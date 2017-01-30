<?php
class Tyrion extends Lannister
{
  public function sleepWith($got)
  {
    if (is_a($got, "Lannister") === FALSE)
    {
      print("Let's do this".PHP_EOL);
    }
    else if (is_a($got, "Cersei") === TRUE)
    {
      print("Not even if I'm drunk !".PHP_EOL);
    }
		else
		{
		  print("Not even if I'm drunk !".PHP_EOL);
	  }
  }
}
?>

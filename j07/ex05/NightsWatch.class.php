<?php
class NightsWatch implements IFighter
{
	private $tab;
	public function recruit($got)
	{
		if ($got instanceof IFighter)
		{
			$this->tab[] = $got;
		}
	}
  public function fight()
	{
    foreach ($this->tab as $key => $value)
    {
      $value->fight();
	  }
  }
}

?>

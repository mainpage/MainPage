<?php

class WorksAction extends BaseAction
{
	public function index()
	{
		$navbar[works] = 'active';
		$this->assign("navbar",$navbar);
		$this->display();
	}
	public function labelFloat()
	{
		$this->display();
	}
	public function imagezoom()
	{
		$this->display();
	}
	public function slider()
	{
		$this->display();
	}
	public function touchSlider()
	{
		$this->display();
	}
}

?>
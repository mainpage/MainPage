<?php

/**
* 
*/
class IndexAction extends BaseAction
{
	public function index()
	{
		$menu['dashboard'] = 'current';
		$this->assign('menu',$menu);
		$this->display();
	}
}

?>


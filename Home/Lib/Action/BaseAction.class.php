<?php

	class BaseAction extends Action
	{
		function _initialize()
		{
			$login_user = $_COOKIE['customer_user'];
			/*if($login_user == null)
			{
				$this->error('请登录!',U('Login/index'));
			}
			else
			{
				$this->assign('user_name',$login_user);
			}*/
			$this->assign('user_name',$login_user);
		}
	}
?>
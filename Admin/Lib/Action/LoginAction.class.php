<?php

class LoginAction extends Action
{
	public function login(){
		$user = M("User");
		$user_name = $_POST['user-name'];
		$password = md5($_POST['password']);
		//查找输入的用户名是否存在
		if($user->where("userName ='$user_name' AND authority = 0")->find())
		{	
			//密码是否正确
			$login_user = $user->where("userName ='$user_name' AND password = '$password'")->find();	
			if($login_user)
			{
				setcookie('admin_user',$login_user['userName'],time()+3600,'/');//本域名下有效
				redirect(U('Index/index'));
			}
			else
			{
				$this->error('密码错误！');
			}
		}
		else{
			$this->error('用户名不存在');
		}
	}

	public function logout()
	{
		setcookie('admin_user','',time()-3600,'/');
		redirect(U('Login/index'));
	}
}

?>
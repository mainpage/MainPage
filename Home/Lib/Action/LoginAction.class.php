<?php

class LoginAction extends Action
{
	public function index()
	{
		$this->display('login');
	}

	public function onLogin()
	{
	    $user = M("User");
		$user_name = $_POST['user-name'];
		$password = md5($_POST['password']);
		//查找输入的用户名是否存在
		if($user->where("userName ='$user_name'")->find())
		{	
			//密码是否正确
			$login_user = $user->where("userName ='$user_name' AND password = '$password'")->find();	
			if($login_user)
			{
				setcookie('customer_user',$login_user['userName'],time()+3600,'/');//本域名下有效
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

	public function onLogout()
	{
		setcookie('customer_user','',time()-3600,'/');
		redirect(U('Login/index'));		
	}

	public function ajaxCheck()
	{
		$data = $_GET['data'];
		$type = $_GET['type'];
		$user = M('user');
		$result = $user->where("$type='$data'")->find(); 
		if($result)
		{
			echo "exist";
		}
		else
		{
			echo "allow";
		}
	}

	public function createCode()
	{
		header("content-type:image/png");
 
	    $code = $_GET['code'];
	    $imageWidth = 100;
	    $imageHeight = 30;
	    
	    //创建图像
	    $codeImage = imagecreate($imageWidth, $imageHeight);
	    
	    //为图像分配颜色
	    imagecolorallocate($codeImage, 240,240,240); 

	    //字体大小
	    $fontSize = 25;
	    
	    //字体名称
	    $fontName = "/Public/fonts/BAUHS93.TTF";

	    /*$color = imagecolorallocate($codeImage, 255,255,255);
	    imagettftext($codeImage,$fontSize,0,10,20,$color,$fontName,"hehe");*/

	    //循环生成图片文字
	    for($i = 0;$i<strlen($code);$i++){
	        
	        //获取文字左上角x坐标
	        $x = 10 + $imageWidth*$i/5;
	        
	        //获取文字左上角y坐标
	        //$y = mt_rand(5, 10);
	        $y = mt_rand(25, $imageHeight);
	        
	        //为文字分配颜色
	        $color = imagecolorallocate($codeImage, mt_rand(0,150), mt_rand(0,150), mt_rand(0,150));
	        
	        //写入文字
	        imagettftext($codeImage,$fontSize,0,$x,$y,$color,$fontName,$code[$i]); //该函数没有效果，不知道为什么
	        //imagestring($codeImage, 5, $x, $y, $code[$i], $color);
	    }
	    
	    //生成干扰码
	    for($i = 0;$i<2200;$i++){
	        $randColor = imagecolorallocate($codeImage, rand(200,255), rand(200,255), rand(200,255));
	        imagesetpixel($codeImage, rand()%180, rand()%90, $randColor);
	    }   
	    //输出图片
	    imagepng($codeImage);
	    imagedestroy($codeImage);
	}

	public function register(){
		$this->display('register');
	}

	public function onRegister(){
	    $user = M("User");
		$user->userName = $_POST['user-name'];
		$user->email = $_POST['email'];
		$user->password = md5($_POST['password']);
		$user->authority = 1;
		if($user->add())
		{
			$this->success('注册成功',U('Login/index'));
		}
		else
		{
			$this->error('注册失败');
		}
	}
}

?>
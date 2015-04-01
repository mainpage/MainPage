<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>个人作品</title>
	<link rel="stylesheet" href="__PUBLIC__/css/home/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="__PUBLIC__/Css/home/blog.css" type="text/css" media="screen">
	<link rel="stylesheet" href="__PUBLIC__/css/home/sch.css" type="text/css" media="screen">
</head>

<body>
	<div class="container">
  <div class="blog-header">
    <h1 class="blog-title"><a href="<?php echo U('Index/index');?>">MainPage</a></h1>
    <p class="lead blog-description">沙朝恒的个人主页 | 为成为老司机而奋斗</p>
  </div>
</div>
<div class="blog-masthead" id="masthead">
  <div class="container">
    <nav class="blog-nav">
      <a class="blog-nav-item <?php echo ($navbar["index"]); ?>" href="<?php echo U('Index/index');?>">文章</a>
      <a class="blog-nav-item <?php echo ($navbar["memo"]); ?>" href="<?php echo U('Memo/index');?>">便签</a>
      <a class="blog-nav-item <?php echo ($navbar["works"]); ?>" href="<?php echo U('Works/index');?>">作品</a>
      <a class="blog-nav-item" href="">相册</a>
      <?php if(($user_name) == ""): ?><a class="blog-nav-item" href="<?php echo U('Login/register');?>" style="float:right;">注册</a>
        <a class="blog-nav-item" href="<?php echo U('Login/index');?>" style="float:right;">登录</a>
      <?php else: ?>
        <a class="blog-nav-item" href="<?php echo U('Login/onLogout');?>" style="float:right;">登出</a>
        <a class="blog-nav-item" style="float:right;"><?php echo ($user_name); ?></a><?php endif; ?>
    </nav>
  </div>
</div>
	<div class="container" style="margin-top:30px;">
		<div class="row">
			<div class="col-md-4 col-narrow">
				<div class="thumbnail">
					<a href="<?php echo U('Works/labelFloat');?>" target="a_blank"><img src="__PUBLIC__/Images/home/works/labelFloat.jpg"></a>
					<div class="caption">
						<h3><a href="<?php echo U('Works/labelFloat');?>" target="a_blank">labelFloat</a></h3>
						<p>表单标签浮动效果</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-narrow">
				<div class="thumbnail">
					<a href="<?php echo U('Works/imagezoom');?>" target="a_blank"><img src="__PUBLIC__/Images/home/works/imagezoom.jpg"></a>
					<div class="caption">
						<h3><a href="<?php echo U('Works/imagezoom');?>" target="a_blank">imagezoom</a></h3>
						<p>仿淘宝图片放大效果</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-narrow">
				<div class="thumbnail">
					<a href=""><img src="__PUBLIC__/Images/home/works/star.jpg"></a>
					<div class="caption">
						<h3><a href="">star</a></h3>
						<p>我就是来占个位子</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-narrow">
				<div class="thumbnail">
					<a href=""><img src="__PUBLIC__/Images/home/works/star.jpg"></a>
					<div class="caption">
						<h3><a href="">star</a></h3>
						<p>我就是来占个位子</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-narrow">
				<div class="thumbnail">
					<a href=""><img src="__PUBLIC__/Images/home/works/star.jpg"></a>
					<div class="caption">
						<h3><a href="">star</a></h3>
						<p>我就是来占个位子</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	    <footer class="blog-footer">
      <p>Based on <a href="http://getbootstrap.com">Bootstrap</a></p>
      <p>© <a href="http://schspace.sinaapp.com" title="© MainPage">MainPage</a> All rights reserved.</p>
        <p><a href="http://schspace.sinaapp.com/admin.php">entrance of backstage</a></p>
    </footer>
</body>

</html>
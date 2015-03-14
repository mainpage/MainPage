<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>用户注册</title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/Css/home//bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/Css/home/blog.css" rel="stylesheet">
    <link href="__PUBLIC__/Css/home/sch.css" rel="stylesheet">
    <link href="__PUBLIC__/Css/home/register.css" rel="stylesheet">

    <script src="__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
    <script src="__PUBLIC__/Js/home/jquery.goup.min.js"></script>
    <script src="__PUBLIC__/Js/home/common.js"></script>
    <script src="__PUBLIC__/Js/home/register.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <a class="blog-nav-item">注册</a>
          <a class="blog-nav-item" href="__URL__/index" style="float:right;">已有账号？请登录</a>
        </nav>
      </div>
    </div>

    <div class="container">
        <div class="content">
        <form method="post" action="__URL__/onRegister">
           <!--用户名-->
           <div id="username" class="input-div">
              <input type="text" id="input-username" name="user-name" class="inputs" value="" placeholder="输入用户名" autocomplete="off" />
              <!--提示信息-->
              <span class="tips" id="username-notice"></span>
              
           </div>
           <!--邮箱-->
           <div id="email" class="input-div">
              <input type="text" id="input-email" name="email" class="inputs" value="" placeholder="输入邮箱地址" autocomplete="off" />
              <!--提示信息-->
              <span class="tips" id="email-notice"></span>
           </div>
           <!--密码-->
           <div id="password" class="input-div">
              <input type="password" id="input-password" name="password" class="inputs" value="" placeholder="设置密码" autocomplete="off" />
              <!--提示信息-->
              <span class="tips" id="password-notice"></span>
           </div>
           <!--确认密码-->
           <div id="confirm-password" class="input-div">
              <input type="password" id="input-confirm-password" name="confirm-password" class="inputs" value="" placeholder="确认密码" autocomplete="off" />
              <!--提示信息-->
              <span class="tips" id="confirm-password-notice"></span>
           </div>
           <!--验证码-->
           <div id="checkcode" class="input-div">
              <input type="text" id="input-checkcode" name="checkcode" class="inputs" value="" placeholder="输入验证码" autocomplete="off" />
              <!--验证码图片-->
              <img id="checkcode-img" src="" style="cursor:pointer" alt="验证码"> 
              <!--提示信息-->
              <span class="tips" id="checkcode-notice"></span>
           </div>   
           <button type="submit" class="btn btn-primary" id="submit">立即注册</button>
         </form>
        </div>

        <div id="ad">
        </div>
    </div>
        <footer class="blog-footer">
      <p>Based on <a href="http://getbootstrap.com">Bootstrap</a></p>
      <p>© <a href="http://schspace.sinaapp.com" title="© MainPage">MainPage</a> All rights reserved.</p>
        <p><a href="http://schspace.sinaapp.com/admin.php">entrance of backstage</a></p>
    </footer>
  </body>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>便签</title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/Css/home//bootstrap.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/Css/home/blog.css" rel="stylesheet">
    <link href="__PUBLIC__/Css/home/sch.css" rel="stylesheet">

    <script src="__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
    <script src="__PUBLIC__/Js/jquery.masonry.min.js"></script>
    <script src="__PUBLIC__/Js//home/jquery.goup.min.js"></script>
    <script src="__PUBLIC__/Js/home/common.js"></script>
    <script src="__PUBLIC__/Js/home/memo.js"></script>

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
      <a class="blog-nav-item <?php echo ($navbar["index"]); ?>" href="<?php echo U('Index/index');?>">文章</a>
      <a class="blog-nav-item <?php echo ($navbar["memo"]); ?>" href="<?php echo U('Memo/index');?>">便签</a>
      <a class="blog-nav-item" href="">相册</a>
      <a class="blog-nav-item" href="">视频</a>
      <?php if(($user_name) == ""): ?><a class="blog-nav-item" href="<?php echo U('Login/register');?>" style="float:right;">注册</a>
        <a class="blog-nav-item" href="<?php echo U('Login/index');?>" style="float:right;">登录</a>
      <?php else: ?>
        <a class="blog-nav-item" href="<?php echo U('Login/onLogout');?>" style="float:right;">登出</a>
        <a class="blog-nav-item" style="float:right;"><?php echo ($user_name); ?></a><?php endif; ?>
    </nav>
  </div>
</div>

    <div class="container" id="masonry">
        <?php if(is_array($memos)): foreach($memos as $key=>$memo): ?><div class="note">
            <p style="font-size:25px;"><?php echo ($memo["keyword"]); ?></p>
            <p><a><?php echo ($memo["createTime"]); ?></a></p>
            <p><?php echo ($memo["content"]); ?></p>
          </div><?php endforeach; endif; ?>
    </div><!-- /.container -->

    <div class="container">
      <div>
          <input type="hidden" id="next-page" value=<?php echo ($mypage->currentPage+1); ?> />
          <input type="hidden" id="total-page" value=<?php echo ($mypage->pageNum); ?> />
      </div>
      <div id="end-info" class="alert alert-info" role="alert"><span>已经到底啦！</span></div>
    </div><!-- /.container -->
    
        <footer class="blog-footer">
      <p>Based on <a href="http://getbootstrap.com">Bootstrap</a></p>
      <p>© <a href="http://schspace.sinaapp.com" title="© MainPage">MainPage</a> All rights reserved.</p>
        <p><a href="http://schspace.sinaapp.com/admin.php">entrance of backstage</a></p>
    </footer>

  </body>
</html>
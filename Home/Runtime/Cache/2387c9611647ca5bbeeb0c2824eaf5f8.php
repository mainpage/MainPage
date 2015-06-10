<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title><?php echo ($blog["title"]); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/Css/home//bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/Css/home/blog.css" rel="stylesheet">
    <link href="__PUBLIC__/Css/home/sch.css" rel="stylesheet">

    <script src="__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
    <script src="__PUBLIC__/Js/jquery.masonry.min.js"></script>
    <script src="__PUBLIC__/Js/home/jquery.goup.min.js"></script>
    <script src="__PUBLIC__/Js/home/common.js"></script>

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

    <div class="container">
      <div class="row">
      <div class="blog-show">
        <div class="blog-post">
          <h2 class="blog-post-title"><?php echo ($blog["title"]); ?></h2>
          <p class="blog-post-meta">
            <?php echo ($blog["lastModifyTime"]); ?> by <i><?php echo ($blog["author"]); ?></i> | <a href="__URL__/index/category/<?php echo ($blog["categoryId"]); ?>"><?php echo ($blog["categoryName"]); ?></a>
          </p>
          <p><?php echo ($blog["content"]); ?></p>
        </div>

        <nav>
          <ul class="pager">
            <?php if(($pre_id) == ""): ?><li class="previous disabled">
                <a><span aria-hidden="true">&larr;</span> Previous</a>
              </li>
            <?php else: ?>
              <li class="previous">
                <a href="__URL__/blog/id/<?php echo ($pre_id); ?>"><span aria-hidden="true">&larr;</span> Previous</a>
              </li><?php endif; ?>
            <?php if(($next_id) == ""): ?><li class="next disabled">
                <a>Next <span aria-hidden="true">&rarr;</span></a>
              </li>
            <?php else: ?>
              <li class="next">
                <a href="__URL__/blog/id/<?php echo ($next_id); ?>">Next <span aria-hidden="true">&rarr;</span></a>
              </li><?php endif; ?>
          </ul>
        </nav>

      </div><!-- /.blog-main -->
      </div><!-- /.row -->
    </div><!-- /.container -->

        <footer class="blog-footer">
      <p>Based on <a href="http://getbootstrap.com">Bootstrap</a></p>
      <p>© <a href="__URL__" title="© MainPage">MainPage</a> All rights reserved.</p>
        <p><a href="http://schspace.sinaapp.com/admin.php">entrance of backstage</a></p>
    </footer>

  </body>
</html>
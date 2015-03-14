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
    <h1 class="blog-title">MainPage</h1>
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

    <div class="container">
      <div class="row">
      <div class="col-sm-8 blog-main">
        <div class="blog-post">
          <hr/>
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

      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
      <h4>About</h4>
      <p><em>Truth's like a blanket that always leaves your feet cold. You push it, stretch it, it'll never be enough. You kick at it, beat it, it will never cover any of us. From the moment we enter crying to the moment we leave dying, it will cover just your face as you wail and cry and scream!</em></p>
    </div>
    <div class="sidebar-module">
      <h4>Categories</h4>
      <ol class="list-unstyled">
        <?php if(is_array($category_list)): foreach($category_list as $key=>$category): ?><li style="font-family:Microsoft YaHei; font-size:16px;">
          <a href="__URL__/index/category/<?php echo ($category["categoryId"]); ?>"><?php echo ($category["categoryName"]); ?></a>
        </li><?php endforeach; endif; ?>
      </ol>
    </div>
    <div class="sidebar-module">
      <h4>Elsewhere</h4>
      <ol class="list-unstyled">
        <li><a href="https://github.com/mainpage" target="a_blank">GitHub</a></li>
        <li><a href="http://weibo.com/u/1824455400" target="a_blank">Weibo</a></li>
      </ol>
    </div>
  </div><!-- /.blog-sidebar -->

</div><!-- /.row -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

  </body>
</html>
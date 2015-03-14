<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>MainPage</title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/Css/home//bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/Css/home/blog.css" rel="stylesheet">
    <link href="__PUBLIC__/Css/home/sch.css" rel="stylesheet">

    <script src="__PUBLIC__/Js/jquery-1.11.2.min.js"></script>
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
        <hr/>
        <?php if(is_array($blog_list)): foreach($blog_list as $key=>$blog): ?><div class="blog-post">
            <h2 class="blog-post-title"><a href="__URL__/blog/id/<?php echo ($blog["id"]); ?>"><?php echo ($blog["title"]); ?></a></h2>
            <p class="blog-post-meta">
              <?php echo ($blog["lastModifyTime"]); ?> by <i><?php echo ($blog["author"]); ?></i> | <a href="__URL__/index/category/<?php echo ($blog["categoryId"]); ?>"><?php echo ($blog["categoryName"]); ?></a>
            </p>
            <p><?php echo ($blog["abstract"]); ?></p>
            <a class="readmore" href="__URL__/blog/id/<?php echo ($blog["id"]); ?>">ReadMore-></a>
          </div><?php endforeach; endif; ?>

        <?php if($mypage->pageNum > 1): ?><nav style="text-align:center;">
          <ul class="pagination pagination-lg">
            <?php if(($mypage->currentPage) == "1"): ?><!--name属性 变量不用加$-->
              <li class="disabled">
                <a aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            <?php else: ?>
              <li>
                <a href="__URL__/index/<?php echo ($next_link_cate); ?>page/<?php echo ($mypage->currentPage-1); ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li><?php endif; ?>
            <?php $__FOR_START__=$mypage->start;$__FOR_END__=$mypage->end+1;for($i=$__FOR_START__;$i < $__FOR_END__;$i+=1){ if(($i) == $mypage->currentPage): ?><li class="active"><a><?php echo ($i); ?></a></li>
              <?php else: ?>
                <li><a href="__URL__/index/<?php echo ($next_link_cate); ?>page/<?php echo ($i); ?>"><?php echo ($i); ?></a></li><?php endif; } ?>
            <?php if(($mypage->currentPage) == $mypage->pageNum): ?><li class="disabled">
                <a aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            <?php else: ?>
              <li>
                <a href="__URL__/index/<?php echo ($next_link_cate); ?>page/<?php echo ($mypage->currentPage+1); ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li><?php endif; ?>
          </ul>
        </nav><?php endif; ?>

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
      <p>Based on <a href="http://getbootstrap.com">Bootstrap</a></p>
      <p>© <a href="http://schspace.sinaapp.com" title="© MainPage">MainPage</a> All rights reserved.</p>
        <p><a href="http://schspace.sinaapp.com/admin.php">entrance of backstage</a></p>
    </footer>

  </body>
</html>
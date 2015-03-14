<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simpla Admin</title>
<link rel="stylesheet" href="__PUBLIC__/Css/admin/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/Css/admin/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/Css/admin/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/facebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.datePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.date.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/others.js"></script>
</head>

<body>
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
			<div id="sidebar">
		<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="<?php echo U('Index/index');?>">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="<?php echo U('Index/index');?>"><img id="logo" src="__PUBLIC__/Images/admin/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a><?php echo ($user_name); ?></a> | <a href="<?php echo U('Login/logout');?>" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo U('Index/index');?>" class="nav-top-item no-submenu <?php echo ($menu["dashboard"]); ?>">Dashboard</a>       
				</li>
								
				<li>
					<a href="#" class="nav-top-item <?php echo ($menu["memo"]); ?>">
						Memos
					</a>
					<ul>
						<li><a class="<?php echo ($menu["new_memo"]); ?>" href="<?php echo U('Memo/add');?>">Create a new Memo</a></li>
						<li><a class="<?php echo ($menu["manage_memo"]); ?>" href="<?php echo U('Memo/index');?>">Manage Memos</a></li>
					</ul>
				</li>
				
				<li> 
					<a href="#" class="nav-top-item <?php echo ($menu["article"]); ?>">Articles</a>
					<ul>
						<li><a class="<?php echo ($menu["new_article"]); ?>" href="<?php echo U('Article/add');?>">Write a new Article</a></li>
						<li><a class="<?php echo ($menu["manage_article"]); ?>" href="<?php echo U('Article/index');?>">Manage Articles</a></li>
						<li><a class="<?php echo ($menu["manage_draft"]); ?>" href="<?php echo U('Article/draft');?>">Manage Drafts</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Image Gallery
					</a>
					<ul>
						<li><a href="#">Upload Images</a></li>
						<li><a href="#">Manage Galleries</a></li>
						<li><a href="#">Manage Albums</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Events Calendar
					</a>
					<ul>
						<li><a href="#">Calendar Overview</a></li>
						<li><a href="#">Add a new Event</a></li>
						<li><a href="#">Calendar Settings</a></li>
					</ul>
				</li>			 
				
			</ul> <!-- End #main-nav -->
					
		</div>
	</div> <!-- End #sidebar -->
		
		<div id="main-content">
			<h2><?php echo ($h1); ?></h2>
			<form action="__URL__/<?php echo ($button_action); ?>" method="post">
				<p style="font-size:17px">Keyword</p>
				<input class="text-input medium-input datepicker" type="text" id="medium-input" name="keyword" value="<?php echo ($memo_item["keyword"]); ?>">
				<p style="font-size:17px; margin-top:10px;">Content</p>
				<div style="display:none;">
					<a href="#" class="close"><img src="__PUBLIC__/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				   <div id="save-notification"></div>
			    </div>
			    <textarea name="content" style="height:250px;"><?php echo ($memo_item["content"]); ?></textarea>
				<br></br>
				<!--隐藏域，保存当前正在编辑memo的id-->
				<input type="hidden" id="memo-id" name="id" value="<?php echo ($memo_item["id"]); ?>"/>
				<input id="submit-memo" class="button" type="submit" value="<?php echo ($button_text); ?>"/>
			</form>
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
		</div>
	</div>

</body>
</html>